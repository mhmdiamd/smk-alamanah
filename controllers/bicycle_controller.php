<?php
require_once __DIR__ . '/../controllers/controller.php';

class BicycleController extends Controller
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getBicycles()
    {
        $query = "SELECT 
            b.id AS bicycle_id,
            b.brand,
            b.model,
            b.price,
            b.image,
            b.description,
            c.id AS category_id,
            c.name AS category_name,
            c.description AS category_description,
            d.id AS dealer_id,
            d.name AS dealer_name,
            d.location,
            d.contact
        FROM bicycles b
        INNER JOIN categories c ON b.category_id = c.id
        INNER JOIN dealers d ON b.dealer_id = d.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function getBicyclesByCategory($category_id)
    {
        $query = "SELECT 
            b.id AS bicycle_id,
            b.brand,
            b.model,
            b.price,
            b.image,
            b.description,
            c.id AS category_id,
            c.name AS category_name,
            c.description AS category_description,
            d.id AS dealer_id,
            d.name AS dealer_name,
            d.location,
            d.contact
        FROM bicycles b
        INNER JOIN categories c ON b.category_id = c.id
        INNER JOIN dealers d ON b.dealer_id = d.id
        WHERE c.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function getBicyclesByDealer($dealer_id)
    {
        $query = "SELECT 
            b.id AS bicycle_id,
            b.brand,
            b.model,
            b.price,
            b.image,
            b.description,
            c.id AS category_id,
            c.name AS category_name,
            c.description AS category_description,
            d.id AS dealer_id,
            d.name AS dealer_name,
            d.location,
            d.contact
        FROM bicycles b
        INNER JOIN categories c ON b.category_id = c.id
        INNER JOIN dealers d ON b.dealer_id = d.id
        WHERE d.id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $dealer_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function createBicycle($category_id, $dealer_id, $brand, $model, $price, $image, $description)
    {
        $errors = [];
        $category_id = trim($category_id);
        $dealer_id = trim($dealer_id);
        $brand = trim($brand);
        $model = trim($model);
        $price = trim($price);
        $image = trim($image);
        $description = trim($description);

        if (!is_numeric($category_id) || $category_id <= 0) {
            return $this->errorResponse('Invalid category ID');
        }
        if (!is_numeric($dealer_id) || $dealer_id <= 0) {
            return $this->errorResponse('Invalid dealer ID');
        }
        if (empty($brand)) {
            return $this->errorResponse('Brand is required');
        }
        if (strlen($brand) > 100) {
            return $this->errorResponse('Brand must be less than 100 characters');
        }
        if (empty($model)) {
            return $this->errorResponse('Model is required');
        }
        if (strlen($model) > 100) {
            return $this->errorResponse('Model must be less than 100 characters');
        }
        if (!is_numeric($price) || $price < 0) {
            return $this->errorResponse('Invalid price');
        }
        if (empty($image)) {
            // return $this->errorResponse('Image is required');
        }
        if (strlen($image) > 255) {
            return $this->errorResponse('Image path must be less than 255 characters');
        }

        if (empty($errors)) {
            $query = "INSERT INTO bicycles (category_id, dealer_id, brand, model, price, image, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("iissdss", $category_id, $dealer_id, $brand, $model, $price, $image, $description);
            if ($stmt->execute()) {
                $stmt->close();
                return $this->successResponse('Bicycle added successfully');
            } else {
                $stmt->close();
                return $this->errorResponse('Failed to add bicycle');
            }
        }
    }

    public function updateBicycle($id, $category_id, $dealer_id, $brand, $model, $price, $image, $description)
    {
        $category_id = trim($category_id);
        $dealer_id = trim($dealer_id);
        $brand = trim($brand);
        $model = trim($model);
        $price = trim($price);
        $image = trim($image);
        $description = trim($description);

        if (!is_numeric($id) || $id <= 0) {
            return $this->errorResponse('Invalid bicycle ID');
        }
        if (!is_numeric($category_id) || $category_id <= 0) {
            return $this->errorResponse('Invalid category ID');
        }
        if (!is_numeric($dealer_id) || $dealer_id <= 0) {
            return $this->errorResponse('Invalid dealer ID');
        }
        if (empty($brand)) {
            return $this->errorResponse('Brand is required');
        }
        if (strlen($brand) > 100) {
            return $this->errorResponse('Brand must be less than 100 characters');
        }
        if (empty($model)) {
            return $this->errorResponse('Model is required');
        }
        if (strlen($model) > 100) {
            return $this->errorResponse('Model must be less than 100 characters');
        }
        if (!is_numeric($price) || $price < 0) {
            return $this->errorResponse('Invalid price');
        }
        // if (empty($image)) {
        //     return $this->errorResponse('Image is required');
        // }
        if (strlen($image) > 255) {
            return $this->errorResponse('Image path must be less than 255 characters');
        }

        $query = "UPDATE bicycles SET category_id = ?, dealer_id = ?, brand = ?, model = ?, price = ?, image = ?, description = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("iissdssi", $category_id, $dealer_id, $brand, $model, $price, $image, $description, $id);
        if ($stmt->execute()) {
            $stmt->close();
            return $this->successResponse('Bicycle updated successfully');
        } else {
            $stmt->close();
            return $this->errorResponse('Failed to update bicycle');
        }
    }

    public function deleteBicycle($id)
    {
        $query = "DELETE FROM bicycles WHERE id = ?";
        $stmt = $this->db->prepare($query);
        try {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $stmt->close();
                return $this->successResponse('Bicycle deleted successfully');
            } else {
                $stmt->close();
                return $this->errorResponse('Failed to delete bicycle');
            }
        } catch (mysqli_sql_exception $e) {
            $stmt->close();
            if ($e->getCode() == $this->errorsCode['CONSTRAINT_VIOLATION']) {
                return $this->errorResponse('Cannot delete bicycle because it is associated with inventory');
            }
            return $this->errorResponse('An error occurred while deleting the bicycle');
        }
    }
}

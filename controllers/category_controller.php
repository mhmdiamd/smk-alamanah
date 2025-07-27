<?php

require_once __DIR__ . '/../controllers/controller.php';
class CategoryController extends Controller
{

    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getCategories()
    {
        $query = "SELECT * FROM categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function createCategory($name, $description)
    {
        $errors = [];
        $name = trim($name);
        $description = trim($description);

        if (empty($name)) {
            return $this->errorResponse('Name is required');
        }
        if (strlen($name) > 255) {
            return $this->errorResponse('Name must be less than 255 characters');
        }

        if (empty($errors)) {
            $query = "INSERT INTO categories (name, description) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("ss", $name, $description);
            if ($stmt->execute()) {
                $stmt->close();
                return $this->successResponse('Category added successfully');
            } else {
                $stmt->close();
                return $this->errorResponse('Failed to add category');
            }
        }
    }

    public function updateCategory($id, $name, $description)
    {
        $name = trim($name);
        $description = trim($description);

        if (empty($name)) {
            return $this->errorResponse('Name is required');
        }
        if (strlen($name) > 255) {
            return $this->errorResponse('Name must be less than 255 characters');
        }

        $query = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssi", $name, $description, $id);
        if ($stmt->execute()) {
            $stmt->close();
            return $this->successResponse('Category updated successfully');
        } else {
            $stmt->close();
            return $this->errorResponse('Failed to update category');
        }
    }


    public function deleteCategory($id)
    {
        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($query);
        try {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $stmt->close();
                return $this->successResponse('Category deleted successfully');
            } else {
                $stmt->close();
                return $this->errorResponse('Failed to delete category');
            }
        } catch (mysqli_sql_exception $e) {
            $stmt->close();
            if ($e->getCode() == $this->errorsCode['CONSTRAINT_VIOLATION']) { // MySQL error code for foreign key constraint violation
                return $this->errorResponse('Cannot delete category because it is associated with bicycles');
            }
            return $this->errorResponse('An error occurred while deleting the category');
        }
    }
}

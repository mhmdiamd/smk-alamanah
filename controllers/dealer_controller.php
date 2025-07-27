<?php
require_once __DIR__ . '/../controllers/controller.php';

class DealerController extends Controller
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function getDealers()
    {
        $query = "SELECT * FROM dealers";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function createDealer($name, $location, $contact)
    {
        $errors = [];
        $name = trim($name);
        $location = trim($location);
        $contact = trim($contact);

        if (empty($name)) {
            return $this->errorResponse('Name is required');
        }
        if (strlen($name) > 100) {
            return $this->errorResponse('Name must be less than 100 characters');
        }
        if (strlen($location) > 255) {
            return $this->errorResponse('Location must be less than 255 characters');
        }
        if (strlen($contact) > 50) {
            return $this->errorResponse('Contact must be less than 50 characters');
        }

        if (empty($errors)) {
            $query = "INSERT INTO dealers (name, location, contact) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("sss", $name, $location, $contact);
            if ($stmt->execute()) {
                $stmt->close();
                return $this->successResponse('Dealer added successfully');
            } else {
                $stmt->close();
                return $this->errorResponse('Failed to add dealer');
            }
        }
    }

    public function updateDealer($id, $name, $location, $contact)
    {
        $name = trim($name);
        $location = trim($location);
        $contact = trim($contact);

        if (empty($name)) {
            return $this->errorResponse('Name is required');
        }
        if (strlen($name) > 100) {
            return $this->errorResponse('Name must be less than 100 characters');
        }
        if (strlen($location) > 255) {
            return $this->errorResponse('Location must be less than 255 characters');
        }
        if (strlen($contact) > 50) {
            return $this->errorResponse('Contact must be less than 50 characters');
        }

        $query = "UPDATE dealers SET name = ?, location = ?, contact = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssi", $name, $location, $contact, $id);
        if ($stmt->execute()) {
            $stmt->close();
            return $this->successResponse('Dealer updated successfully');
        } else {
            $stmt->close();
            return $this->errorResponse('Failed to update dealer');
        }
    }

    public function deleteDealer($id)
    {
        $query = "DELETE FROM dealers WHERE id = ?";
        $stmt = $this->db->prepare($query);
        try {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $stmt->close();
                return $this->successResponse('Dealer deleted successfully');
            } else {
                $stmt->close();
                return $this->errorResponse('Failed to delete dealer');
            }
        } catch (mysqli_sql_exception $e) {
            $stmt->close();
            if ($e->getCode() == $this->errorsCode['CONSTRAINT_VIOLATION']) {
                return $this->errorResponse('Cannot delete dealer because it is associated with bicycles or inventory');
            }
            return $this->errorResponse('An error occurred while deleting the dealer');
        }
    }
}
?>
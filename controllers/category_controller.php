<?php
class CategoryController
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCategories()
    {
        $query = "SELECT * FROM categories";
        $response = $this->db->prepare($query);
        $response->execute();
        $categories = $response->get_result();
        return $categories;
    }

    public function createCategory(
        $name,
        $description
    ) {
        $query = "INSERT INTO categories (id, name, description) VALUES (NULL, '$name', '$description')";
        $response = $this->db->prepare($query);
        return $response->execute();
    }

    public function updateCategory($id, $name, $description)
    {
        $query = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $name, $description, $id); // 'ssi' = string, string, integer
        return $stmt->execute();
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}

<?php
class HomeController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBicycles()
    {
        $query = "SELECT * FROM bicycles";
        $response = $this->db->prepare($query);
        $response->execute();
        $bicycles = $response->get_result();
        return $bicycles;
    }

    public function index()
    {
        include_once __DIR__ . '/../views/home.php';
    }
}

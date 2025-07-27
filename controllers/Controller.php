<?php

class Controller
{
    protected $db;
    protected $errorsCode = [
        "CONSTRAINT_VIOLATION" => 1451,
    ];

    public function __construct($db)
    {
        $this->db = $db;
    }

    protected function successResponse($message)
    {
        return [
            'success' => true,
            'message' => $message
        ];
    }

    protected function errorResponse($message)
    {
        return [
            'success' => false,
            'message' => $message
        ];
    }
}
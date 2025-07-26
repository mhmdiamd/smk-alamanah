<?php
session_start();
include_once __DIR__ . '/../../includes/config.php';
include_once __DIR__ . '/../../controllers/category_controller.php';

$categoryController = new CategoryController($mysqli);
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$result = $categoryController->createCategory($name, $description);
$status = $result ? 'success' : 'error';
$redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
$_SESSION['flash_message'] = [
    'type' => 'success',
    'message' => 'Category created successfully'
];
header("Location: $redirectUrl");
exit();

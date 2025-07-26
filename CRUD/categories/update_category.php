<?php
session_start();
include_once __DIR__ . '/../../includes/config.php';
include_once __DIR__ . '/../../controllers/category_controller.php';

$categoryController = new CategoryController($mysqli);
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$result = $categoryController->updateCategory($id, $name, $description);

$status = $result ? 'success' : 'error';
$redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
$_SESSION['flash_message'] = [
    'type' => $status,
    'message' => $status === 'success' ? 'Category updated successfully' : 'Failed to update category'
];
header("Location: $redirectUrl");
exit();

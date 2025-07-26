<?php
session_start();
include_once __DIR__ . '/../../includes/config.php';
include_once __DIR__ . '/../../controllers/category_controller.php';

$categoryController = new CategoryController($mysqli);
$id = $_POST['id'] ?? '';
$result = $categoryController->deleteCategory((int)$id);

$status = $result ? 'success' : 'error';
$redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
$_SESSION['flash_message'] = [
    'type' => $status,
    'message' => $status === 'success' ? 'Category deleted successfully' : 'Failed to delete category'
];
header("Location: $redirectUrl");
exit();

<?php
session_start();
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../controllers/category_controller.php';

$categoryController = new CategoryController($mysqli);
$categories = $categoryController->getCategories();

switch (strtoupper($_POST['action'])) {
    case 'CREATE':
        $name = $_POST['name'];
        $description = $_POST['description'];
        $result = $categoryController->createCategory($name, $description);
        $_SESSION['flash_message'] = [
            'type' => $result['success'] ? 'success' : 'error',
            'message' => $result['message']
        ];
        break;

    case 'UPDATE':
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        if ($id) {
            $result = $categoryController->updateCategory($id, $name, $description);
            $_SESSION['flash_message'] = [
                'type' => $result['success'] ? 'success' : 'error',
                'message' => $result['message']
            ];
        }
        break;

    case 'DELETE':
        $id = $_POST['id'] ?? null;
        if ($id) {
            $result = $categoryController->deleteCategory($id);
            $_SESSION['flash_message'] = [
                'type' => $result['success'] ? 'success' : 'error',
                'message' => $result['message']
            ];
        }
        break;
}
$redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
header('Location: ' . $redirectUrl);
exit;

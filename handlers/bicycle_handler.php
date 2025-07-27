<?php
session_start();
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../controllers/bicycle_controller.php';

$bicycleController = new BicycleController($mysqli);
$bicycles = $bicycleController->getBicycles();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['id'] ?? null;
    $category_id = $_POST['category_id'] ?? '';
    $dealer_id = $_POST['dealer_id'] ?? '';
    $brand = $_POST['brand'] ?? '';
    $model = $_POST['model'] ?? '';
    $price = $_POST['price'] ?? '';
    $image = $_POST['image'] ?? '';
    $description = $_POST['description'] ?? '';

    switch (strtoupper($action)) {
        case 'CREATE':
            $result = $bicycleController->createBicycle($category_id, $dealer_id, $brand, $model, $price, $image, $description);
            $_SESSION['flash_message'] = [
                'type' => $result['success'] ? 'success' : 'error',
                'message' => $result['message']
            ];
            break;

        case 'UPDATE':
            if ($id) {
                $result = $bicycleController->updateBicycle($id, $category_id, $dealer_id, $brand, $model, $price, $image, $description);
                $_SESSION['flash_message'] = [
                    'type' => $result['success'] ? 'success' : 'error',
                    'message' => $result['message']
                ];
            }
            break;

        case 'DELETE':
            if ($id) {
                try {
                    $result = $bicycleController->deleteBicycle($id);
                    $_SESSION['flash_message'] = [
                        'type' => $result['success'] ? 'success' : 'error',
                        'message' => $result['message']
                    ];
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() == 1451) { // Foreign key constraint violation
                        $_SESSION['flash_message'] = [
                            'type' => 'error',
                            'message' => 'Cannot delete bicycle because it is associated with inventory'
                        ];
                    } else {
                        $_SESSION['flash_message'] = [
                            'type' => 'error',
                            'message' => 'An error occurred while deleting the bicycle'
                        ];
                    }
                }
            }
            break;
    }
    $redirectUrl = $_SERVER['HTTP_REFERER'] ?? '/';
    header('Location: ' . $redirectUrl);
    exit;
}

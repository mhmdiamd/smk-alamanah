<?php
session_start();
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../controllers/dealer_controller.php';

$dealerController = new DealerController($mysqli);
$dealers = $dealerController->getDealers();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? '';
    $location = $_POST['location'] ?? '';
    $contact = $_POST['contact'] ?? '';

    switch (strtoupper($action)) {
        case 'CREATE':
            $result = $dealerController->createDealer($name, $location, $contact);
            $_SESSION['flash_message'] = [
                'type' => $result['success'] ? 'success' : 'error',
                'message' => $result['message']
            ];
            break;

        case 'UPDATE':
            if ($id) {
                $result = $dealerController->updateDealer($id, $name, $location, $contact);
                $_SESSION['flash_message'] = [
                    'type' => $result['success'] ? 'success' : 'error',
                    'message' => $result['message']
                ];
            }
            break;

        case 'DELETE':
            if ($id) {
                try {
                    $result = $dealerController->deleteDealer($id);
                    $_SESSION['flash_message'] = [
                        'type' => $result['success'] ? 'success' : 'error',
                        'message' => $result['message']
                    ];
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() == 1451) { // Foreign key constraint violation
                        $_SESSION['flash_message'] = [
                            'type' => 'error',
                            'message' => 'Cannot delete dealer because it is associated with bicycles or inventory'
                        ];
                    } else {
                        $_SESSION['flash_message'] = [
                            'type' => 'error',
                            'message' => 'An error occurred while deleting the dealer'
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

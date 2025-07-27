<?php
define('BASE_URL', '/wimcycle_project');
require_once __DIR__ . '/../controllers/category_controller.php';
require_once __DIR__ . '/../controllers/dealer_controller.php';

$categoryController = new CategoryController($mysqli);
$categories = $categoryController->getCategories();

$dealerController = new DealerController($mysqli);
$dealers = $dealerController->getDealers();

$menus = [
    'home' => [
        'name' => 'Home',
        'url' => BASE_URL . '/views/home.php',
        'icon' => 'bi-house'
    ],
    'bicycles' => [
        'name' => 'Bicycles',
        'url' => BASE_URL . '/views/bicycle.php',
        'icon' => 'bi-bicycle'
    ],
];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand fw-bold" href="<?php echo BASE_URL ?>">WimCycle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach ($menus as $menu): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo htmlspecialchars($menu['url']); ?>">
                                <!-- <i class="<?php echo htmlspecialchars($menu['icon']); ?>"></i> -->
                                <?php echo htmlspecialchars($menu['name']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dealers
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($dealers as $dealer): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/views/bicycle.php?dealer_id=<?php echo htmlspecialchars($dealer['id']); ?>"><?php echo htmlspecialchars($dealer['name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $category): ?>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/views/bicycle.php?category_id=<?php echo htmlspecialchars($category['id']); ?>"><?php echo htmlspecialchars($category['name']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . '/views/dashboard/bicycle.php' ?>">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
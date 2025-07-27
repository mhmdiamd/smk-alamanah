<?php
define('BASE_URL', '/wimcycle_project');
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
    'categories' => [
        'name' => 'Categories',
        'url' => BASE_URL . '/views/category.php',
        'icon' => 'bi-tags'
    ],
    'dealers' => [
        'name' => 'Dealers',
        'url' => BASE_URL . '/views/dealer.php',
        'icon' => 'bi-shop'
    ]
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
            <a class="navbar-brand" href="#">Navbar</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
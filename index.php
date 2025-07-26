<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/controllers/home_controller.php';
require_once __DIR__ . '/controllers/category_controller.php';

$controller = new HomeController($mysqli);
$controller->index();

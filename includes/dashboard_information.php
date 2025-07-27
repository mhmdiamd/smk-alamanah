<?php
include_once __DIR__ . '/../controllers/bicycle_controller.php';
include_once __DIR__ . '/../controllers/category_controller.php';
include_once __DIR__ . '/../controllers/dealer_controller.php';

$bicycleController = new BicycleController($mysqli);
$bicycles = $bicycleController->getBicycles();

$categoryController = new CategoryController($mysqli);
$categories = $categoryController->getCategories();

$dealerController = new DealerController($mysqli);
$dealers = $dealerController->getDealers();
?>

<!-- Info Cards -->
<div class="row row-cols-1 row-cols-md-3 g-3 mt-4">
    <!-- Bicycles Card -->
    <div class="col-md-4">
        <a href="<?php echo BASE_URL; ?>/views/dashboard/bicycle.php" class="card-wrapper text-decoration-none">
            <div class="card border-0 shadow-sm h-100 bg-primary text-white">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="bi bi-bicycle fs-2 me-3"></i>
                    <div class="text-right flex-grow-1">
                        <h5 class="card-title fw-bold mb-1">Bicycles</h5>
                        <p class="card-text"><?php echo $bicycles->num_rows; ?> Available</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Categories Card -->
    <div class="col-md-4">
        <a href="<?php echo BASE_URL; ?>/views/dashboard/category.php" class="card-wrapper text-decoration-none">
            <div class="card border-0 shadow-sm h-100 bg-success text-white">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="bi bi-tags fs-2 me-3"></i>
                    <div class="text-right flex-grow-1">
                        <h5 class="card-title fw-bold mb-1">Categories</h5>
                        <p class="card-text"><?php echo $categories->num_rows; ?> Types</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- Dealers Card -->
    <div class="col-md-4">
        <a href="<?php echo BASE_URL; ?>/views/dashboard/dealer.php" class="card-wrapper text-decoration-none">
            <div class="card border-0 shadow-sm h-100 bg-info text-white">
                <div class="card-body p-3 d-flex align-items-center">
                    <i class="bi bi-shop fs-2 me-3"></i>
                    <div class="text-right flex-grow-1">
                        <h5 class="card-title fw-bold mb-1">Dealers</h5>
                        <p class="card-text"><?php echo $dealers->num_rows; ?> Partners</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
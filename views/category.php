<?php
include_once __DIR__ . '/../includes/config.php';
include_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../controllers/category_controller.php';
require_once __DIR__ . '/../controllers/dealer_controller.php';
require_once __DIR__ . '/../controllers/bicycle_controller.php';

$categoryController = new CategoryController($mysqli);
$categories = $categoryController->getCategories();

$dealerController = new DealerController($mysqli);
$dealers = $dealerController->getDealers();

$bicycleController = new BicycleController($mysqli);
$bicycles = $bicycleController->getBicycles();
?>

<!-- Hero Section -->
<div class="bg-primary bg-gradient text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Our Categories</h1>
        <p class="lead mb-4">Discover the best bicycles from top dealers.</p>
    </div>
</div>

<!-- Categories Section -->
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php if ($categories->num_rows > 0): ?>
            <?php while ($category = $categories->fetch_assoc()): ?>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-3">
                            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($category['name']); ?></h5>
                            <p class="card-text text-muted small"><?php echo htmlspecialchars(substr($category['description'], 0, 80)) . (strlen($category['description']) > 80 ? '...' : ''); ?></p>
                            <a href="<?php echo BASE_URL; ?>views/category.php?id=<?php echo htmlspecialchars($category['id']); ?>" class="btn btn-outline-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-muted">No categories available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-dark text-white py-4 text-center">
    <h3 class="fw-light">Start Your Journey Today</h3>
    <a href="<?php echo BASE_URL; ?>views/bicycles.php" class="btn btn-outline-light btn-sm">Shop Now</a>
</div>

<?php
include_once __DIR__ . '/../includes/footer.php';
?>
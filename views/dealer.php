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
        <h1 class="display-4 fw-bold">Trusted Dealers</h1>
        <p class="lead mb-4">Discover the best bicycles from top dealers.</p>
        <a href="<?php echo BASE_URL; ?>views/bicycles.php" class="btn btn-light btn-lg">Explore Now</a>
    </div>
</div>

<!-- Dealers Section -->
<div class="bg-light py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            <?php if ($dealers->num_rows > 0): ?>
                <?php while ($dealer = $dealers->fetch_assoc()): ?>
                    <div class="col">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center p-3">
                                <h5 class="card-title fw-bold"><?php echo htmlspecialchars($dealer['name']); ?></h5>
                                <p class="card-text text-muted small"><?php echo htmlspecialchars($dealer['location']); ?></p>
                                <a href="<?php echo BASE_URL; ?>views/dealer.php?id=<?php echo htmlspecialchars($dealer['id']); ?>" class="btn btn-outline-success btn-sm">Visit</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-muted">No dealers available.</p>
            <?php endif; ?>
        </div>
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
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

if ($_GET["category_id"] ?? false) {
    $categoryId = $_GET["category_id"];
    $bicycles = $bicycleController->getBicyclesByCategory($categoryId);
} elseif ($_GET["dealer_id"] ?? false) {
    $dealerId = $_GET["dealer_id"];
    $bicycles = $bicycleController->getBicyclesByDealer($dealerId);
}
?>

<!-- Hero Section -->
<div class="bg-primary bg-gradient text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Featured Bicycles</h1>
        <p class="lead mb-4">Discover the best bicycles from top dealers.</p>
    </div>
</div>

<!-- Bicycles Section -->
<div class="container py-5">
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php if ($bicycles->num_rows > 0): ?>
            <?php while ($bicycle = $bicycles->fetch_assoc()): ?>
                <div class="col">
                    <div class="card border-0 shadow-sm h-100">
                        <?php if (!empty($bicycle['image'])): ?>
                            <img src="../assets/images/<?php echo htmlspecialchars($bicycle['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($bicycle['brand'] . ' ' . $bicycle['model']); ?>" style="max-height: 200px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="card-body text-center p-3">
                            <h5 class="card-title fw-bold"><?php echo htmlspecialchars($bicycle['brand'] . ' ' . $bicycle['model']); ?></h5>
                            <p class="card-text text-muted">Price: $<?php echo number_format($bicycle['price'], 2); ?></p>
                            <a href="<?php echo BASE_URL; ?>views/bicycle.php?id=<?php echo htmlspecialchars($bicycle['bicycle_id']); ?>" class="btn btn-outline-primary btn-sm">Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-muted">No bicycles available.</p>
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
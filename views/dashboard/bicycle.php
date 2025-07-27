<?php
session_start();
include_once __DIR__ . '/../../includes/config.php';
include_once __DIR__ . '/../../includes/header.php';
include_once __DIR__ . '/../../controllers/bicycle_controller.php';
include_once __DIR__ . '/../../controllers/category_controller.php';
include_once __DIR__ . '/../../controllers/dealer_controller.php';

$bicycleController = new BicycleController($mysqli);
$bicycles = $bicycleController->getBicycles();

$categoryController = new CategoryController($mysqli);
$categories = $categoryController->getCategories();

$dealerController = new DealerController($mysqli);
$dealers = $dealerController->getDealers();

// Handler jika ada filter berdasarkan kategori atau dealer
if ($_GET["category_id"] ?? false) {
    $categoryId = $_GET["category_id"];
    $bicycles = $bicycleController->getBicyclesByCategory($categoryId);
} elseif ($_GET["dealer_id"] ?? false) {
    $dealerId = $_GET["dealer_id"];
    $bicycles = $bicycleController->getBicyclesByDealer($dealerId);
}
?>

<div class="container min-vh-100 pb-5">
    <?php include_once __DIR__ . '/../../includes/dashboard_information.php'; ?>
    <div class="w-100 d-flex justify-content-between align-items-center mt-5 mb-3">
        <h2 class="mt-2 mb-2">Data Bicycle</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Bicycle
        </button>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Brand</th>
                <th>Dealer</th>
                <th>Category</th>
                <th>Model</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($bicycles->num_rows > 0): ?>
                <?php foreach ($bicycles as $index => $bicycle): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($index + 1); ?></td>
                        <td>
                            <?php echo htmlspecialchars($bicycle['brand']); ?>
                        </td>
                        <td><?php echo htmlspecialchars($bicycle['dealer_name']); ?></td>
                        <td><?php echo htmlspecialchars($bicycle['category_name']); ?></td>
                        <td><?php echo htmlspecialchars($bicycle['model']); ?></td>
                        <td><?php echo htmlspecialchars($bicycle['price']); ?></td>
                        <td><?php echo htmlspecialchars($bicycle['image']); ?></td>
                        <td><?php echo htmlspecialchars($bicycle['description']); ?></td>
                        <td class="d-flex gap-2">
                            <button type="button" class="btn p-0 text-primary" data-bs-toggle="modal" data-bs-target="#exampleDeleteModal<?php echo htmlspecialchars($index + 1); ?>">
                                <i class="bi bi-trash-fill text-danger"></i>
                            </button>

                            <!-- Delete Confirmation -->
                            <div class="modal fade" id="exampleDeleteModal<?php echo htmlspecialchars($index + 1); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data <?php echo htmlspecialchars($bicycle['brand']); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this bicycle?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form method="POST" action="../../handlers/bicycle_handler.php">
                                                <input type="hidden" name="action" value="DELETE">

                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($bicycle['bicycle_id']); ?>">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn p-0 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo htmlspecialchars($index + 1); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <!-- Edit Bicycle Modal -->
                            <div class="modal fade" id="exampleModal<?php echo htmlspecialchars($index + 1); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="../../handlers/bicycle_handler.php">
                                            <input value="<?php echo htmlspecialchars($bicycle['bicycle_id']); ?>" type="hidden" name="id" class="form-control">
                                            <input value="UPDATE" type="hidden" name="action" class="form-control">

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Brand</label>
                                                    <input type="text" value="<?php echo htmlspecialchars($bicycle['brand']); ?>" name="brand" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Category</label>
                                                    <select class="form-select" name="category_id" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <?php foreach ($categories as $category): ?>
                                                            <option <?php echo $category['id'] === $bicycle['category_id'] ? 'selected' : ''; ?> value="<?php echo htmlspecialchars($category['id']); ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Dealer</label>
                                                    <select class="form-select" name="dealer_id" aria-label="Default select example">
                                                        <option selected>Open this select menu</option>
                                                        <?php foreach ($dealers as $dealer): ?>
                                                            <option <?php echo $dealer['id'] === $bicycle['dealer_id'] ? 'selected' : ''; ?> value="<?php echo htmlspecialchars($dealer['id']); ?>"><?php echo htmlspecialchars($dealer['name']); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Model</label>
                                                    <input type="text" value="<?php echo htmlspecialchars($bicycle['model']); ?>" name="model" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Price</label>
                                                    <input type="number" value="<?php echo htmlspecialchars($bicycle['price']); ?>" name="price" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                                    <textarea name="description" class="form-control"><?php echo htmlspecialchars($bicycle['description']); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Create -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../../handlers/bicycle_handler.php">
                <input type="hidden" name="action" value="CREATE" class="form-control">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category['id']); ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Dealer</label>
                        <select class="form-select" name="dealer_id" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php foreach ($dealers as $dealer): ?>
                                <option value="<?php echo htmlspecialchars($dealer['id']); ?>"><?php echo htmlspecialchars($dealer['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Model</label>
                        <input type="text" name="model" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Success create toast -->
<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="statusToast" class="toast align-items-center text-white <?php echo $_SESSION['flash_message']['type'] === 'success' ? 'bg-success' : 'bg-danger'; ?> border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo htmlspecialchars($_SESSION['flash_message']['message']); ?>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.getElementById('statusToast');
            var toast = new bootstrap.Toast(toastEl, {
                delay: 3000
            });
            toast.show();
        });
    </script>
    <?php
    unset($_SESSION['flash_message']);
    ?>
<?php endif; ?>

<?php
include_once __DIR__ . '/../../includes/footer.php';
?>
<?php
session_start();
include_once __DIR__ . '/../../includes/config.php';
include_once __DIR__ . '/../../includes/header.php';
include_once __DIR__ . '/../../controllers/category_controller.php';

$categoryController = new CategoryController($mysqli);
$categories = $categoryController->getCategories();

?>

<div class="container min-vh-100 pb-5">
    <?php include_once __DIR__ . '/../../includes/dashboard_information.php'; ?>

    <div class="w-100 d-flex justify-content-between align-items-center mt-5 mb-3">
        <h2 class="mt-2 mb-2">Data Kategori</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Kategori
        </button>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($categories->num_rows > 0): ?>
                <?php foreach ($categories as $index => $category): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($index + 1); ?></td>
                        <td>
                            <a href="../../views/bicycle.php?category_id=<?php echo htmlspecialchars($category['id']); ?>">
                                <?php echo htmlspecialchars($category['name']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($category['description']); ?></td>
                        <td class="d-flex gap-2">
                            <button type="button" class="btn p-0 text-primary" data-bs-toggle="modal" data-bs-target="#exampleDeleteModal<?php echo htmlspecialchars($index + 1); ?>">
                                <i class="bi bi-trash-fill text-danger"></i>
                            </button>

                            <!-- Delete Confirmation -->
                            <div class="modal fade" id="exampleDeleteModal<?php echo htmlspecialchars($index + 1); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data <?php echo htmlspecialchars($category['name']); ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this category?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <form method="POST" action="../../handlers/category_handler.php">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
                                                <input type="hidden" name="action" value="DELETE">
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn p-0 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo htmlspecialchars($index + 1); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <!-- Edit Category Modal -->
                            <div class="modal fade" id="exampleModal<?php echo htmlspecialchars($index + 1); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="../../handlers/category_handler.php">
                                            <input value="<?php echo htmlspecialchars($category['id']); ?>" type="hidden" name="id" class="form-control">
                                            <input value="UPDATE" type="hidden" name="action" class="form-control">

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                                    <input value="<?php echo htmlspecialchars($category['name']); ?>" type="text" name="name" class="form-control">
                                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Description</label>
                                                    <input value="<?php echo htmlspecialchars($category['description']); ?>" name="description" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update changes</button>
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

            <form method="POST" action="../../handlers/category_handler.php">
                <input type="hidden" name="action" value="CREATE">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <input name="description" type="text" class="form-control">
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
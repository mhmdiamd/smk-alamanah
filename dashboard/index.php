<?php
require_once "../database/list_data_sepeda.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <?php include "../includes/navbar.php" ?>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-3">
                <div class="card bg-success text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total Dealer</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="./dealer.php" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card bg-danger text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total Sepeda</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="./sepeda.php" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card bg-primary text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total Penjual</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="./penjual.php" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card bg-warning text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="./kategori.php" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h2>Data Sepeda</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTambah">Tambah Sepeda</button>

                <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <divs class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah sepeda</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Merek</label>
                                        <input type="text" class="form-control" placeholder="Masukan merek">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tipe</label>
                                        <input type="text" class="form-control" placeholder="Masukan Tipe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                                        <input type="number" class="form-control" placeholder="Masukan harga">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                        <textarea name="" id="" class="form-control" placeholder="Masukan deskripsi">

                                                        </textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list_data_sepeda as $sepeda): ?>
                    <tr>
                        <td>
                            <?php echo $sepeda['id'] ?>
                        </td>
                        <td>
                            <?php echo $sepeda['merek']; ?>
                        </td>
                        <td>
                            <?php echo $sepeda['tipe']; ?>
                        </td>
                        <td>
                            <?php echo $sepeda['harga']; ?>
                        </td>
                        <td>-</td>
                        <td>
                            <?php echo $sepeda['deskripsi']; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $sepeda['id'] ?>">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $sepeda['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete <?php echo $sepeda['merek'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus data <?php echo $sepeda['merek'] ?>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate<?php echo $sepeda['id'] ?>">
                                    Update
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalUpdate<?php echo $sepeda['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <divs class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update <?php echo $sepeda['merek'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Merek</label>
                                                        <input value="<?php echo $sepeda['merek'] ?>" type="text" class="form-control" placeholder="Masukan merek">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Tipe</label>
                                                        <input value="<?php echo $sepeda['tipe'] ?>" type="text" class="form-control" placeholder="Masukan Tipe">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                                                        <input value="<?php echo $sepeda['harga'] ?>" type="number" class="form-control" placeholder="Masukan harga">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                                        <textarea name="" id="" class="form-control" placeholder="Masukan deskripsi">
                                                            <?php echo $sepeda['deskripsi'] ?>
                                                        </textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script src="../jquery-3.7.1.js"></script>
    <script src="../dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    <script>
        new DataTable("#example")
    </script>
</body>

</html>
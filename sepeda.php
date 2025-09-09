<?php
require_once __DIR__ . "/Storage/data_sepeda.php";
require_once __DIR__ . "/helpers/filter.php";

use function Helpers\filter_by_id;

$sepeda_id = 0;
if (isset($_GET['id'])) {
    $sepeda_id = (int) $_GET['id'];
}


$data_sepeda = $data_sepeda;
$detail_sepeda = filter_by_id($data_sepeda, $sepeda_id);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php include "./includes/header.php" ?>

    <div class="container-fluid bg-primary text-light d-flex flex-column align-items-center py-5">
        <h1>Sepeda</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, eius.</p>
    </div>

    <!-- Jumbotron -->
    <div class="container-fluid start-0 m-0 p-0">

        <!-- Container -->
        <div class="container d-flex flex-column justify-content-center position-relative w-100">
            <div class="row">
                <?php if ($detail_sepeda): ?>
                    <a href="<?php echo "./sepeda.php" ?>" class="mt-5 card-link">Kembali</a>
                    <div class="col-12 mt-5">
                        <div class="row mb-5">
                            <div class="col-lg-5">
                                <img style="border-radius: 20px;" class="img-fluid" src="<?php echo $detail_sepeda['gambar'] ?>" alt="">
                            </div>
                            <div class="col-lg-7 px-3">
                                <h2>
                                    <?php echo $detail_sepeda['merek']; ?>
                                </h2>
                                <!-- Tipe Sepeda -->
                                <h5 class="text-secondary">
                                    <?php echo $detail_sepeda['tipe']; ?>
                                </h5>
                                <!-- Harga sepeda -->
                                <h1>Rp.<?php echo $detail_sepeda['harga']; ?></h1>
                                <!-- Deskripsi Sepeda -->
                                <p class="mt-3"><?php echo $detail_sepeda['deskripsi']; ?></p>
                                <div class="d-flex gap-3 pt-3">
                                    <button class="btn btn-warning">Masukan Keranjang</button>
                                    <button class="btn btn-success">Beli Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else : ?>
                    <?php foreach ($data_sepeda as $sepeda): ?>
                        <div class="col-12 col-sm-6 col-lg-4 py-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $sepeda['merek'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $sepeda['tipe'] ?></h6>
                                    <p class="card-text"><?php echo $sepeda['deskripsi'] ?></p>
                                    <a href="<?php echo "./sepeda.php?id=" . $sepeda['id'] ?>" class="card-link">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-body container d-flex justify-content-between">
            <div>
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>

            <a href="#" class="btn btn-primary" style="height: fit-content">Go somewhere</a>
        </div>
    </div>

    <div class="w-100 container text-center py-3">
        <p>@Copyright 2025, by (Nama Kalian)</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
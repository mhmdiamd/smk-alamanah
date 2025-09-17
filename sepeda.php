<?php
require_once __DIR__ . "/database/list_data_sepeda.php";

$sepeda_id = null;
if (isset($_GET['id'])) {
    $sepeda_id = $_GET['id'];
}

$data_sepeda = $list_data_sepeda;

$detail_sepeda = null;
foreach ($data_sepeda as $sepeda) {
    if ($sepeda['id'] == $sepeda_id) {
        $detail_sepeda = $sepeda;
    }
}

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
    <?php include "./includes/navbar.php" ?>

    <div class="bg-primary text-light text-center py-5">
        <h1>Selamat Datang di WimCycle</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, sapiente?</p>
        <button type="button" class="btn btn-outline-light">Beli Sekarang</button>
    </div>

    <!-- Jumbotron kategori -->
    <div class="container-fluid bg-light py-5">

        <!-- Section Sepeda -->
        <div class="container mt-5">
            <div class="row">
                <?php if ($detail_sepeda): ?>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <a href="sepeda.php">
                                    Kembali ke daftar sepeda
                                </a>
                            </div>
                            <div class="col-12 col-md-4 col-lg-5">
                                <img class="img-fluid" src="<?php echo $detail_sepeda['gambar'] ?>" alt="">
                            </div>
                            <div class="col-12 col-md-8 col-lg-7">
                                <h2>
                                    <?php echo $detail_sepeda['merek'] ?>
                                </h2>
                                <h4 class="text-secondary">
                                    <?php echo $detail_sepeda['tipe'] ?>
                                </h4>
                                <h1>
                                    Rp.<?php echo $detail_sepeda['harga'] ?>
                                </h1>
                                <p>
                                    <?php echo $detail_sepeda['deskripsi'] ?>
                                </p>
                                <div class="d-flex py-3 gap-3">
                                    <button class="btn btn-warning">Masukan Keranjang</button>
                                    <button class="btn btn-success">Beli Sekarang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($data_sepeda as $sepeda): ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $sepeda['merek']; ?>
                                    </h5>
                                    <h6 class="card-subtitle text-body-secondary mb-2">
                                        <?php echo $sepeda['tipe']; ?>
                                    </h6>
                                    <p class="card-text">
                                        <?php echo $sepeda['deskripsi'] ?>
                                    </p>
                                    <a href="<?php echo "sepeda.php?id=" . $sepeda["id"] ?>" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>

    <div class="container-fluid text-light bg-dark text-center py-5">
        <h3>Start your journey</h3>
        <button type="button" class="btn btn-outline-light">Beli Sekarang</button>
    </div>

    <div class="text-center py-3">
        <p>@Copyright 2025, by nama_kalian</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
<?php

require_once __DIR__ . "/helpers/filter.php";
use function Helpers\filter_sepeda_by_tipe;
require_once __DIR__ . "/database/data_sepeda.php" ;

$tipe = "";
if (isset($_GET['tipe'])) {
    $tipe = $_GET['tipe'];
}

$data = $data_sepeda;
$dataSepeda = filter_sepeda_by_tipe($data, $tipe);

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
        <h1>
            <?php if(!$tipe) {
                echo "Semua Kategori";
            } else {
                echo $tipe;
            } ?>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, sapiente?</p>
    </div>

    <!-- Jumbotron kategori -->
    <div class="container-fluid bg-light py-5">
        <!-- Section Kategori -->
        <div class="container mt-5">
            <div class="row">
                <?php foreach($dataSepeda as $sepeda): ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $sepeda['nama'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Xtrada 5</h6>
                            <p class="card-text"><?php echo $sepeda['description'] ?></p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
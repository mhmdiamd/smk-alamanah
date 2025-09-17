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
        <!-- Judul Kategori -->
        <div class="container text-center mt-5">
            <h2>Kategori</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum placeat praesentium, perspiciatis eos ea dicta.</p>
        </div>

        <!-- Section Kategori -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Polygon</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Xtrada 5</h6>
                            <p class="card-text">Sepeda gunung hardtail dengan frame ringan alloy ALX dan sistem drivetrain 1x10-speed, cocok untuk pemula hingga menengah yang ingin menjajal medan off-road dan jalur XC.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumbotron Penjual -->
    <div class="container-fluid py-5">
        <!-- Judul Kategori -->
        <div class="container text-center mt-5">
            <h2>Penjual</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum placeat praesentium, perspiciatis eos ea dicta.</p>
        </div>
        <!-- Section Kategori -->
        <div class="container d-flex justify-content-around mt-5">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Polygon</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Xtrada 5</h6>
                    <p class="card-text">Sepeda gunung hardtail dengan frame ringan alloy ALX dan sistem drivetrain 1x10-speed, cocok untuk pemula hingga menengah yang ingin menjajal medan off-road dan jalur XC.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Jumbotron Sepeda -->
    <div class="container-fluid py-5">
        <!-- Judul Sepeda -->
        <div class="container text-center mt-5">
            <h2>Sepeda</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum placeat praesentium, perspiciatis eos ea dicta.</p>
        </div>
        <!-- Section Sepeda -->
        <div class="container d-flex justify-content-around mt-5">

            <div class="card" style="width: 18rem;">
                <img src="sepeda1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
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
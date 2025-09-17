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
        <div class="row">
            <div class="col-12 vh-100 d-flex justify-content-center align-items-center">
                <div class="card" style="width: 32rem; height: fit-content;">
                    <div class="card-body">
                        <h2 class="card-title text-center">Register</h2>
                        <h6 class="card-subtitle mb-5 text-center text-body-secondary">Daftar sekarang untuk bergabung dengan komunitas kami.</h6>

                        <form>
                             <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="email" class="form-control" placeholder="Masukan nama lengkap" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" placeholder="contoh@gmail.com" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" placeholder="Masukan password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>

                            <p class="text-center mt-4">Sudah punya akun? klik untuk <a href="./login.php">Login</a> Sekarang!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
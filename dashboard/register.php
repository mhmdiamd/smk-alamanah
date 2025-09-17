<?php

require_once "../Storage/data_sepeda.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="../dataTables.dataTables.css">

    <title>Document</title>
</head>

<body>
    <?php include "../includes/header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-12 vh-100 d-flex justify-content-center align-items-center">
                <div class="card" style="max-width: 32rem; max-height: fit-content;">
                    <div class="card-body">
                        <h2 class="card-title text-center">Register</h2>
                        <p class="card-subtitle text-body-secondary mb-3 text-center">Daftar sekarang dan jadilah bagian dari komunitas kami!</p>
                        <form>
                              <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" placeholder="Masukan nama lengkap" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" placeholder="contoh@gmail.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" placeholder="********" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>

                            <p class="text-center mt-4">Sudah punya akun? Klik <a href="./login.php">disini</a> untuk Login!</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
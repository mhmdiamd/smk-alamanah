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
        <div class="row mt-5 mb-5">
            <div class="col-lg-6">
                <div class="card bg-success text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card bg-danger text-light">
                    <div class="card-body">
                        <h5 class="card-title">Kateogri populer</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-light">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2>Data Kategori</h2>
            </div>
        </div>

        <table id="tableSepeda" class="display">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>-</td>
                    <td>Sepeda Balap</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, ut!</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="../jquery-3.7.1.js"></script>
    <script src="../dataTables.js"></script>

    <script>
        new DataTable("#tableSepeda");
    </script>
</body>

</html>
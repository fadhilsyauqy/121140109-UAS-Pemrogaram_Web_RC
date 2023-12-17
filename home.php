<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


//tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">

    <title>Data Siswa </title>

</head>

<body>

    <!-- navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #d87093;">
        <div class="container">
            <a class="navbar-brand" href="#">
                Rahmat Fadhil Syauqy.A | 121140109
            </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="home.php">
                            <i class="bi bi-house-fill"></i>
                            <span class="ms-1 ">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="formulir.php">
                            <i class="bi bi-list-columns-reverse"></i>
                            <span class="ms-1 ">Formulir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabel.php">
                            <i class="bi bi-gear-fill"></i>
                            <span class="ms-1">Tabel</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="bi bi-door-open-fill"></i>
                            <span class="ms-1">Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->




    <div class="container my-5">

        <h1 class="text-center mb-3">DAFTAR MAHASISWA</h1>

        <div>
            <form action="" method="post" class="d-flex " role="search">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Telusuri..." aria-label="Search" autocomplete="off" style="border: 3px solid #d87093;">
                <button class="btn btn-outline-primary" name="cari" type="submit">Telusuri</button>
            </form>
        </div>


        <div class="row mt-4">
            <?php foreach ($mahasiswa as $row) : ?>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card m-2 p-3" style="max-width: 540px; border:3px solid #d87093 ">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="image/<?= $row["gambar"];  ?>" class="img-fluid rounded" alt="gbr rusak">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $row["nama"]; ?></h4>
                                    <p class="card-text ">
                                    <ul class="list-unstyled">
                                        <li><b>NIM : </b><?= $row["nim"]; ?> </li>
                                        <li><b>Program Studi : </b> <?= $row["prodi"]; ?> </li>
                                        <li><b>Alamat : </b> <?= $row["alamat"]; ?> </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
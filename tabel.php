<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">

    <title>Tabel</title>
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
                        <a class="nav-link" aria-current="page" href="home.php">
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
                        <a class="nav-link active" href="tabel.php">
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


    <div class="container p-4">
        <div class="row">

            <h1 class="text-center mb-5">PENGATURAN</h1>


            <div class="col mt-3">
                <form action="" method="post" class="d-flex " role="search">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Telusuri..." aria-label="Search" autocomplete="off" style="border: 3px solid #d87093;">
                    <button class="btn btn-outline-primary" name="cari" type="submit">Telusuri</button>
                </form>
            </div>
            <dir class="table-responsive">
                <table class="table table-striped table-hover mt-3">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>

                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["nim"]; ?></td>
                            <td><?= $row["prodi"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td><img src="image/<?= $row["gambar"]; ?>" alt="foto rusak" width="80"></td>
                            <td>

                                <a class="text-decoration-none" href="ubah.php?id=<?= $row["id"]; ?>">
                                    <button type="button" class="btn btn-outline-warning">UPDATE</button>
                                </a>
                                <a class="text-decoration-none" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('anda yakin menghapus data ini');">
                                    <button type="button" class="btn btn-outline-danger">DELETE</button>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </dir>
        </div>
    </div>

</body>

</html>
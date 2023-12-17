<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}



require 'functions.php';

//cek apakah tombol sudaah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('DATA BERHASIL DITAMBAH');
                document.location.href = 'settings.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA GAGAL DITAMBAH');
                document.location.href = 'settings.php';
            </script>
        ";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="style/style.css">

    <script src="script/validasi.js"></script>
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
                        <a class="nav-link active" aria-current="page" href="formulir.php">
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



    <div id="myContainer">
        <div id="myBox">
            <h2 class="text-white mb-3">Tambah Data Mahasiswa</h2>
            <form action="" method="post" enctype="multipart/form-data" class="mb-3" id="myForm" onsubmit="return validateForm()">
                <div class="mb-3 ps-3">
                    <label class="form-label" for="nama"> NAMA : </label>
                    <input class="form-control" type="text" name="nama" id="nama">
                    <span id="namaError" class="text-danger"></span>
                </div>
                <div class="mb-3 ps-3">
                    <label class="form-label" for="nim"> NIM : </label>
                    <input class="form-control" type="number" name="nim" id="nim">
                    <span id="nimError" class="text-danger"></span>
                </div>
                <div class="mb-3 ps-3">
                    <label class="form-label" for="prodi"> PROGRAM STUDI : </label>
                    <input class="form-control" type="text" name="prodi" id="prodi">
                    <span id="prodiError" class="text-danger"></span>
                </div>
                <div class="mb-3 ps-3">
                    <label class="form-label" for="alamat"> ALAMAT : </label>
                    <textarea class="form-control" type="text" name="alamat" id="alamat"></textarea>
                    <span id="alamatError" class="text-danger"></span>
                </div>
                <div class="mb-5 ps-3">
                    <label class="form-label" for="gambar"> GAMBAR : </label>
                    <input class="form-control" type="file" name="gambar" id="gambar">
                    <span id="gambarError" class="text-danger"></span>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-light" type="submit" name="submit">Tambahkan Data</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="script/dom.js"></script>

</body>

</html>
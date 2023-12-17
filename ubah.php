<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}



require 'functions.php';

//ambil data  di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


//cek apakah tombol sudaah ditekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('DATA BERHASIL DIUBAH');
                document.location.href = 'tabel.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('DATA TIDAK ADA YANG DIUBAH');
                document.location.href = 'tabel.php';
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
    <title>ubah Data Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center mt-3">
        <div class="row border rounded-3 p-3  shadow box-area" style="background-color:rgba(217, 112, 147,.7) ;">



            <h1 class="mb-3 text-white">Update Data Siswa</h1>

            <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">

                <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">

                <div class="mb-3">
                    <label class="form-label" for="nama"> NAMA : </label>
                    <input class="form-control" type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nim"> NIM : </label>
                    <input class="form-control" type="number" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="prodi"> PROGRAM STUDI : </label>
                    <input class="form-control" type="text" name="prodi" id="prodi" required value="<?= $mhs["prodi"]; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat"> ALAMAT : </label>
                    <input class="form-control" type="text" name="alamat" id="alamat" required value="<?= $mhs["alamat"]; ?>">
                </div>
                <div class="mb-5">
                    <label class="form-label" for="gambar"> FOTO : </label>
                    <div class="mb-1">
                        <img class="img-thumbnail" src="image/<?= $mhs["gambar"]; ?>" alt="" width="80">
                    </div>
                    <input class="form-control" type="file" name="gambar" id="gambar">
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-light" type="submit" name="submit" onclick="return confirm('anda yakin merubah data ini');">Ubah Data</button>
                </div>


            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
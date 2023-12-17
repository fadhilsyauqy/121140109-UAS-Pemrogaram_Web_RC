<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (regis($_POST) > 0) {
        // Pesan sukses jika user berhasil terdaftar
        echo "<script>
                alert('user baru berhasil ditambahkan');
            </script>";

        // Redirect ke halaman login
        header("Location: login.php");
        exit;
    } else {
        echo mysqli_error($syauqy);
    }
}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">

    <!-- Bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">

    <title>Register</title>

</head>

<body>
    <!-- main container -->
    <div id="container">
        <div id="login-container">
            <form action="" method="post" class="row align-items-center">
                <p class="fs-2 text-md-center pt-2 " style="color: #d87093; font-weight:700;">R E G I S T E R </p>
                <div class="mb-3">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" name="email" id="email" class="form-control rounded-4 " placeholder="Email" autocomplete="off">
                    <span class="error-msg text-danger" id="emailError"></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password </label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control rounded-4 " placeholder="Password">
                        <button class="btn" type="button" id="eye">
                            <i class="bi bi-eye-slash-fill" style="color: #d87093;"></i>
                        </button>
                    </div>
                    <span class="error-msg text-danger" id="passwordError"></span>
                </div>
                <div class="mb-5">
                    <label for="password2" class="form-label">Konfirmasi Password </label>
                    <div class="input-group">
                        <input type="password" name="password2" id="password2" class="form-control rounded-4 " placeholder="Konfirmasi Password">
                        <button class="btn" type="button" id="eyeConfirm">
                            <i class="bi bi-eye-slash-fill" style="color: #d87093;"></i>
                        </button>
                    </div>
                    <span class="error-msg text-danger" id="password2Error"></span>
                </div>
                <div class="d-grid z col-6 mx-auto mb-3">
                    <button class="btn  text-white" style="background: #d87093;" type="submit" name="register" onclick="return validateRegis()">Register</button>
                </div>
                <div id="huruf">
                    <p class="text-center">Sudah punya akun? <a href="login.php" style="color: #d87093;">Login</a></p>
                </div>

            </form>
        </div>
    </div>
    </div>

    <script src="script/dom_login.js"></script>
    <script src="script/shw_regis(oop).js"></script>
    <script src="script/validasi_regis.js"></script>
</body>

</html>
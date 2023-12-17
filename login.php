<?php
session_start();
require 'functions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['ikan'])) {
    $id = $_COOKIE['id'];
    $ikan = $_COOKIE['ikan'];


    //ambil email berdasarkan id
    $result = mysqli_query($syauqy, "SELECT email FROM user WHERE id = $id ");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan email
    if ($ikan === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
    }


    if (isset($_SESSION["login"])) {
        header("Location: formulir.php");
        exit;
    }
}

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($syauqy, "SELECT * FROM user WHERE email = '$email'");

    //cek email
    if (mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            // Set session
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST["remember"])) {
                // buat cookie

                setcookie('id', $row['id'], time() + 300);
                setcookie('ikan', hash('sha256', $row['email']), time() + 300);
            }

            // Menyimpan informasi IP address dan browser ke database
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $browser = $_SERVER['HTTP_USER_AGENT'];

            // Escape nilai sebelum dimasukkan ke database
            $ip_address = mysqli_real_escape_string($syauqy, $ip_address);
            $browser = mysqli_real_escape_string($syauqy, $browser);

            // Query untuk memasukkan informasi ke dalam tabel login_logs
            $query = "INSERT INTO login_logs (ip_address, browser, login_time) VALUES ('$ip_address', '$browser', NOW())";

            // Melakukan query untuk merekam informasi login
            mysqli_query($syauqy, $query);

            header("Location: formulir.php");
            exit;
        }
    }

    $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootsrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">


    <title>Login</title>
</head>

<body>
    <script src="/script/cookies.js"></script>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                Username atau Password Salah!!
            </div>
        </div>
    <?php endif; ?>


    <!-- main container -->
    <div id="container">
        <!-- login contianer -->
        <div id="login-container">
            <form action="" method="post" class="row align-items-center">
                <p class="fs-2 text-md-center pt-2 " style="color: #d87093; font-weight:700;">L O G I N</p>
                <div class="mb-3">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" name="email" id="email" class="form-control rounded-4 " placeholder="Email" autocomplete="off">
                    <span class="error-msg text-danger" id="emailError"></span>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password </label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control rounded-4 " placeholder="Password">
                        <button class="btn" type="button" id="eye">
                            <i class="bi bi-eye-slash-fill" style="color: #d87093;"></i>
                        </button>
                    </div>
                    <span class="error-msg text-danger" id="passwordError"></span>
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="d-grid z col-6 mx-auto mb-3">
                    <button class="btn text-white" style="background: #d87093;" type="submit" name="login" onclick="return validateLogin()">Login</button>
                </div>
                <div>
                    <p class="text-center">Belum punya akun? <a href="register.php" style="color: #d87093;">Register</a></p>
                </div>

            </form>
        </div>
    </div>

    <script src="script/dom_login.js"></script>
    <script src="script/show.js"></script>
    <script src="script/validasi_login.js"></script>
</body>

</html>
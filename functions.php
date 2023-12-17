<?php
require 'koneksi.php';


function query($query){
    global $syauqy;
    $result = mysqli_query($syauqy, $query);
    $rows = [] ;
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $syauqy;

    //ambil data dari tiap elemen
    $nama= htmlspecialchars($data["nama"]) ;
    $nim= htmlspecialchars( $data["nim"]);
    $prodi= htmlspecialchars($data["prodi"]) ;
    $alamat= htmlspecialchars($data["alamat"]) ;
    
     //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO mahasiswa VALUES ('','$nama','$nim','$prodi','$alamat','$gambar') ";
    
    mysqli_query($syauqy, $query);

    return mysqli_affected_rows($syauqy);
}


function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek gambar
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar Terlebih Dahulu');
            </script>";
        return false;
    }

    // cek gambar atau tidak
    $exstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $exstensiGambar = explode('.', $namaFile);
    $exstensiGambar = strtolower(end($exstensiGambar));

    if (!in_array($exstensiGambar, $exstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
            </script>";
        return false;
    }

    //cek ukuran file
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    //siap upload
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $exstensiGambar;

    move_uploaded_file($tmpName, 'image/' . $namaFileBaru);

    return $namaFileBaru;
}


function hapus($id){
    global $syauqy;
    mysqli_query($syauqy, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($syauqy);

}


function ubah($data){
    global $syauqy;
    //ambil data dari tiap elemen
    $id =  $data["id"];
    $nama= htmlspecialchars($data["nama"]) ;
    $nim= htmlspecialchars( $data["nim"]);
    $prodi= htmlspecialchars($data["prodi"]) ;
    $alamat= htmlspecialchars($data["alamat"]) ;
    $gambarlama= htmlspecialchars($data["gambarlama"]) ;

      //cek pilih foto baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }


    //query insert data
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                prodi = '$prodi',
                alamat = '$alamat',
                gambar = '$gambar'
            WHERE id = $id
            ";
    
    mysqli_query($syauqy, $query);

    return mysqli_affected_rows($syauqy);

}

function cari($keyword) {
    $query = "SELECT * FROM mahasiswa
                WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            prodi LIKE '%$keyword%' OR
            alamat LIKE '%$keyword%'
        ";
    return query($query);
}



//login
//login
function regis($data)
{
    global $syauqy;

    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($syauqy, $data["password"]);
    $password2 = mysqli_real_escape_string($syauqy, $data["password2"]);

    // Mendapatkan alamat IP pengguna
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Mendapatkan jenis browser pengguna
    $browser = $_SERVER['HTTP_USER_AGENT'];

    //cek email sudah ada atau tidak
    $result = mysqli_query($syauqy, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar !!');
            </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak cocok');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user ke database
    $query = "INSERT INTO user VALUES ('','$email','$password','$ip_address','$browser')";
    mysqli_query($syauqy, $query);

    return mysqli_affected_rows($syauqy);
}
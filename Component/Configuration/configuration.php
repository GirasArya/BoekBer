<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "boekber";

$con = mysqli_connect($server, $username, $password, $database);
if(!$con){
    die("koneksi gagal!");
}

function registrasi($data)
{
    global $con;
    $username = $data["Username"];
    $password = $data["Password"];
    $password2 = $data["Password_confirm"];
    $email = $data["Email"];
    $phone = $data["Phone_number"];

    //mengecek apakah username dimasukkan
    if ($username === "") {
        echo "<script>
        alert('masukkan username')</script>";
        return false;
    }
    //cek konfirmasi password
    else if ($password !== $password2) {
        echo "<script>
        alert('password yang dimasukkan tidak sesuai')</script>";
        return false;
    } else {
        mysqli_query($con, "INSERT INTO user VALUES('', '$username', '$password', '$email', '$phone')");
        return mysqli_affected_rows($con);
    }
}

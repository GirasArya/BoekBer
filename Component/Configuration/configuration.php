<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "boekber";

$con = mysqli_connect($host,$username,$password,$db);
if(!$con){
    die("koneksi gagal!");
}

function registrasi($data)
{
    global $con;
    $username = $data["username"];
    $password = $data["password"];
    $password2 = $data["password2"];
    //mengecek apakah username dimasukkan
    if($username === "")
    {
        echo "<script>
        alert('masukkan username')</script>";
        return false;
    }
    //cek konfirmasi password
    else if($password !== $password2)
    {
        echo "<script>
        alert('password yang dimasukkan tidak sesuai')</script>";
        return false;
    }
    else{
        mysqli_query($con, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($con);
    }
}

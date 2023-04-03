<?php
session_start();
include("../../Component/Configuration/configuration.php");
//saat tombol login di klik
if(isset($_POST["button-login"]))
 {  
    
    $username = $_POST['username'];
    $password = $_POST['password'];


    $hasil = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    //cek username
    $row = mysqli_fetch_assoc($hasil);
    var_dump($row["username"]);
    $jumlah = mysqli_num_rows($hasil);
    if($jumlah===1)
    {   
        $hasil = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION['username']=$row['username'];
        var_dump($row);
        $_SESSION['id_user'] = $row['id_user'];
        $_POST['id_user']=$row['id_user'];
        header("Location: index1.php");
       
    }
    else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
        header("Location: fiturlogin.php");
    }
 }
?>
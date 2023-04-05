<?php
session_start();
include("../../Component/Configuration/configuration.php");


//saat tombol login di klik
if(isset($_POST["login"]))
 {  
    
    $username = $_POST['Username'];
    $password = $_POST['Password'];


    $hasil = mysqli_query($con, "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
    //cek username
    $row = mysqli_fetch_assoc($hasil);
    // var_dump($row["Username"]);
    $jumlah = mysqli_num_rows($hasil);
    if($jumlah===1)
    {   
        $hasil = mysqli_query($con, "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'");
        $row = mysqli_fetch_assoc($hasil);
        $_SESSION['Username']=$row['Username'];
        var_dump($row);
        $_SESSION['id'] = $row['id'];
        $_POST['id']=$row['id'];
        header("Location: ../../Features/Home/Home_after_login.php");
       
    }
    else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
        // header("Location: Login.php");
    }
 }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond">
    <link rel="stylesheet" href="Login.css" />
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
    <title>Boekber Login!</title>
</head>

<body>
    <nav>
        <div class="nav-logo">
            <img src="./../../Asset/Navbar Logo.svg" alt="Boekber">
        </div>
    </nav>
    <section>
        <div class="form">
            <div class="form-header">
                <h2>Login to Boekber</h2>
            </div>
            <form action="" method="post">
                <div class="form-login">
                    <input name="Username" type="text" placeholder="Username" autocomplete="off">
                    <input name="Password" type="password" placeholder="Password" autocomplete="off">
                    <div class="form-submit">
                        <h3><a href="../Register/Register.php">Don't have an account? click here</a></h3>
                        <button name="login" type="submit">
                            Login!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
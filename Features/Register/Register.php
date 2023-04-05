<?php
require '../../Component/Configuration/configuration.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script> alert('akun berhasil dibuat!')</script>";
        header("Location: ../../Features/Home/Home_before_login.php");
    } else {
        echo mysqli_error($con);
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
    <link rel="stylesheet" href="Register.css" />
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
    <title>Boekber Register!</title>
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
                <h2>Register to Boekber</h2>
            </div>
            <form action="" method="post">
                <div class="form-register">
                    <input name="Username" type="text" placeholder="Username" autocomplete="off">
                    <input name="Password" type="password" placeholder="Password" autocomplete="off">
                    <input name="Password_confirm" type="password" placeholder="Confirmation Password" autocomplete="off">
                    <input name="Email" type="email" placeholder="Email" autocomplete="off">
                    <input name="Phone_number" type="text" placeholder="Phone Number" autocomplete="off">
                    <div class="form-submit">
                        <h3><a href="../Login/Login.php">have an account? click here</a></h3>
                        <button name="register" type="submit">Register!</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
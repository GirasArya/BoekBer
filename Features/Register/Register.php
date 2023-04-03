<?php
require '../../Component/Configuration/configuration.php';
if(isset($_POST["register"]))
{
    if(registrasi($_POST)>0)
    {
        echo"<script> alert('akun berhasil dibuat!')</script>";
        header("Location: ./Features/Register/Register.php");
    }
    else{
        echo mysqli_error($con);
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="editan.css">
    <title>Sign-up</title>
</head>

<body>
    
        <div class="background">
            <div class="background-register">
                <h2>Create New Account</h2>
                <form action="" method="post">
                    <input name="username" type="text" placeholder="Username">
                    <input name="password" type="password" placeholder="Password">
                    <input name="password2" type="password" placeholder="Confirm Password">
                    <div class="background-button">
                        <button name="register">Log In</button>
                    </div>
                </form>    
            </div>
        </div>
    
</body>
</html>



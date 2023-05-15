<?php
session_start();
include("../../Component/Configuration/configuration.php");
if (!isset($_SESSION['Username'])) {
    header("Location: ../../Features/Login/Login.php");
}

$iduser = $_SESSION["id"];
$QueryID = mysqli_query($con, "SELECT * FROM user WHERE id = '$iduser'");
$newQueryID = mysqli_query($con, "SELECT * FROM user WHERE id = '$iduser'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond">
    <title>Profile</title>
</head>

<body>
    <!-- Navbar -->
    <section>
        <div class="container-navbar">
            <div class="navbar-logo">
                <img src="./../../Asset/Navbar Logo.svg" alt="Boekber">
            </div>
            <div class="navbar-list">
                <a href="./../Home/Home_after_login.php">
                    <li>Home</li>
                </a>
                <a href="../../Features/Book/Book.php">
                    <li>Book</li>
                </a>
                <a href="About.php">
                    <li>About</li>
                </a>
                <a href="Profile.php">
                    <li>Profile</li>
                </a>
            </div>

            <div class="navbar-profile">
                <img src="../../Asset//User Icon.svg" alt="Icon">
                <?php
                while ($baris = mysqli_fetch_array($QueryID)) {
                    echo "<h2> $baris[Username]</h2>";
                }
                ?>
            </div>
        </div>
    </section>
    <section>
        <div class="profile-container">
            <div class="profile-header">
                <h1>Profile</h1>
            </div>
            <div class="profile-data">
                <?php
                while ($profile_data = mysqli_fetch_array($newQueryID)) {
                    echo "<h1> Username : $profile_data[Username]</h1>";
                    echo "<h2> Email    : $profile_data[Email]</h2>";
                    echo "<h2> Phone Number    : $profile_data[Phone_Number]</h2>";
                }
                ?>
            </div>
        </div>
    </section>
    <button style="display: flex; justify-content:space-between; margin:auto; margin-top:50px;">
        <a href="../Home/Home_before_login.php" style="padding: 10px 25px; border-radius: 0px; background-color: #D1A475; color: white; text-decoration: none; display: flex; justify-content: center;">
        Sign Out
        </a>
    </button>
</body>

</html>
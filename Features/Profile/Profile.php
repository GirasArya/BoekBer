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
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
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
                <a href="../Home/Home_after_login.php">
                    <li>Home</li>
                </a>
                <a href="../../Features/Book/Book.php">
                    <li>Book</li>
                </a>
                <a href="../../Features/About/About.php">
                    <li>About</li>
                </a>
            </div>

            <div class="navbar-profile">
                <a href="../History/History.php">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </a>
                <div>
                    <a href="../Profile/Profile.php" class="profile-wrapper">
                        <i class="fa-regular fa-user"></i>
                        <?php
                        while ($baris = mysqli_fetch_array($QueryID)) {
                            echo "<h2> $baris[Username]</h2>";
                        }
                        ?>
                    </a>
                </div>
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
                    echo "<h1> $profile_data[Username]</h1>";
                    echo "<h2> $profile_data[Phone_Number]</h2>";
                    echo "<h2> $profile_data[Email]</h2>";
                }
                ?>
            </div>
        </div>
    </section>
    <div class="signout-button">
        <a href="../Home/Home_before_login.php">
            <button>
                Sign Out
            </button>
        </a>
    </div>
</body>

</html>
<?php
session_start();
include("../../Component/Configuration/configuration.php");
if (!isset($_SESSION['Username'])) {
    header("Location: ../../Features/Login/Login.php");
}


$iduser = $_SESSION["id"];

$QueryID = mysqli_query($con, "SELECT * FROM user WHERE id = '$iduser'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Barber.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond">
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
    <title>barber</title>
</head>

<body>
    <!-- Navbar -->
    <div class="container-navbar">
        <div class="navbar-logo">
            <img src="./../../Asset/Navbar Logo.svg" alt="Boekber">
        </div>
        <div class="navbar-list">
            <a href="../../Features/Home/Home_after_login.php">
                <li>Home</li>
            </a>
            <a href="../../Book/Book.php">
                <li>Book</li>
            </a>
            <a href="About.php">
                <li>About</li>
            </a>
            <a href="../Profile/Profile.php">
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

    <section>
        <div class="barber-header">
            <div class="barber-return-arrow">
                <a href="../Book/Book.php">
                    <img src="../../Asset/return_arrow.svg">
                </a>
            </div>
            <img src="../../Asset/Booking-Scissor-Icon.svg">
            <h2>Our Cutter</h2>
        </div>
        <div class="barber-container">
            <div class="barber-wrapper">
                <!-- Looping untuk display toko barber di bawah ini -->
                <?php
                $BarberID = 1;
                for ($BarberID = 1; $BarberID < 4; $BarberID++) {
                    $QueryBarber = mysqli_query($con, "SELECT * FROM `tukang_cukur` WHERE idBarber = '$BarberID'");
                    echo '<div class="barber">';
                    //looping ambil data toko barber per ID
                    while ($Barber = mysqli_fetch_array($QueryBarber)) {
                        echo    '<img src="../../Asset/Barber-Placeholder-pic.svg" alt="Barber Placeholder">';
                        echo "<h2> $Barber[nama_barber]</h2>";
                        // echo "<h3> $Barber[Open_Days]</h2>";
                        echo "<h3> $Barber[Service_Hour]</h2>";
                        echo "<h3> Rp.$Barber[Price]</h2>";
                        echo '<button type="submit">';
                        echo '<a class = "barber-link" href="../../Features/Barber/Barber.php"> Book! </a>';
                        echo '</button>';
                    }
                    echo '</div>';
                }
                ?>
            </div>

        </div>

        </div>
    </section>

    <Footer>
        <div class="footer">
            <div class="footer-container-left">
                <div class="footer-spotlight">
                    <div class="footer-header">
                        <h2>BOEKBER</h2>
                        <img src="../../Asset/Footer Line.svg" />
                    </div>

                    <div class="footer-social">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-address">
                    <p>
                        Kampus IPB, Jl. Raya Dramaga, Babakan, Kec. Dramaga,<br />
                        Kabupaten Bogor, Jawa Barat 16680
                    </p>
                </div>
            </div>
            <div class="footer-container-right">
                <h2>Feedback Form</h2>
                <div class="input">
                    <div class="input-email">
                        <input type="text" placeholder="Email" />
                    </div>
                    <div class="input-message">
                        <input type="text" placeholder="Put Your Message" />
                    </div>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <p>copyright ©️ Kelompok 2 RPL 2</p>
        </div>
    </Footer>

</body>

</html>
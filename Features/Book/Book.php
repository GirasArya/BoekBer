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
  <link rel="stylesheet" href="Book.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond">
  <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
  <title>Booking</title>
</head>

<body>
      <!-- Navbar -->
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



  <section>
    <div class="booking-header">
      <h2>Our Barbershop Partner</h2>
    </div>
    <div class="booking-container">
      <div class="booking-wrapper">
        <!-- Looping untuk display toko barber di bawah ini -->
        <?php
        $TokoID = 1;
        for ($TokoID = 1; $TokoID < 4; $TokoID++) {
          $QueryStore = mysqli_query($con, "SELECT * FROM `tempat_cukur` WHERE idToko = '$TokoID'");
          echo '<div class="booking">';
          //looping ambil data toko barber per ID
          while ($Toko_Barber = mysqli_fetch_array($QueryStore)) {
            echo "<img src= 'getimgbarbershop.php?id=" . $Toko_Barber['idToko'] . "'>";
            echo "<h2> $Toko_Barber[Nama_Toko]</h2>";
            echo "<h3> $Toko_Barber[Open_Days]</h2>";
            echo "<h3> $Toko_Barber[Service]</h2>";
            echo "<h3> $Toko_Barber[Lokasi]</h2>";
            echo '<button type="submit">';
            echo '<a class = "booking-link" href="../../Features/Barber/Barber.php"> Book! </a>';
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
                <h2>Detail Alamat</h2>
                <div class="footer-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1341.9692905706263!2d106.73098484173013!3d-6.558171113633961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4b758d5c1b5%3A0x89b0802179c78bdf!2sDepartemen%20Ilmu%20Komputer%20FMIPA%20IPB!5e0!3m2!1sen!2sid!4v1684931234095!5m2!1sen!2sid"
                        width="346" height="206" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <p>copyright ©️ Kelompok 2 RPL 2</p>
        </div>
    </Footer>

</body>

</html>
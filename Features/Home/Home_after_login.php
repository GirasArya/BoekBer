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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Boekber!</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond">
  <link rel="stylesheet" href="Home.css" />
  <link rel="stylesheet" href="../../Component/Footer/Footer.css">
  <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Navbar -->
  <div class="container-navbar">
    <div class="navbar-logo">
      <img src="./../../Asset/Navbar Logo.svg" alt="Boekber">
    </div>
    <div class="navbar-list">
      <a href="Home_after_login.php">
        <li>Home</li>
      </a>
      <a href="../../Features/Book/Book.php">
        <li>Book</li>
      </a>
      <a href="About.php">
        <li>About</li>
      </a>
      <a href="../../Features/History/History.php">
        <li>History</li>
      </a>
    </div>

    <div class="navbar-profile">
      <div>
        <a href="../Profile/Profile.php" class="profile-wrapper">
          <img src="../../Asset//User Icon.svg" alt="Icon">
          <?php
          while ($baris = mysqli_fetch_array($QueryID)) {
            echo "<h2> $baris[Username]</h2>";
          }
          ?>
        </a>
      </div>
    </div>
  </div>


  <!-- Hero / Main -->
  <main>
    <span>
      <div class="main">
        <div class="main-header">
          <h1>Boeking</h1>
          <h1>with</h1>
          <h1>Boekber</h1>
        </div>
        <div class="main-line">
          <p></p>
        </div>
        <div class="main-button">
          <a href="#">
            <h2>Book Now</h2>
          </a>
        </div>
      </div>
    </span>
  </main>

  <!-- Web Desc Section -->
  <section>
    <span> <!-- About Boekber -->
      <div class="desc">
        <div class="desc-header">
          <h2> Boeking with BOEKBER</h2>
          <img src="./../../Asset/moustache w line.svg" />
        </div>
        <div class="desc-body">
          <h2>
            Boekber is a website that provides lorem ipsum dolor sit amet constructor sit dolor amet
            constrectur sit dolor amet lorem ipsum dolor sit amet constructor sit
            dolor amet lorem ipsum dolor sit amet constructor sit dolor amet
          </h2>
        </div>
      </div>
    </span>

    <span>
      <div class="desc-satisfactory">
        <div class="desc-section">
          <div class="desc-grid1">
            <h2>70+</h2>
            <p>Barbershop Affiliates</p>
          </div>
          <div class="desc-grid2">
            <h2>90%</h2>
            <p>Customer Satisfation</p>
          </div>
          <div class="desc-grid3">
            <h2>3+</h2>
            <p>Years of Expriences</p>
          </div>
        </div>
      </div>
    </span>

    <span> <!-- Booking -->
      <div class="desc-booking">
        <div class="desc-header">
          <h2> How to book with BOEKBER</h2>
          <img src="./../../Asset/moustache w line.svg" />
        </div>
        <div class="booking-flow">
          <img src="./../../Asset/flow.svg" alt="booking-flow" />

        </div>
        <div class="booking-desc">
          <h2>Open BOEKBER on website</h2>
        </div>
      </div>
    </span>

    <span class="review">
      <div class="desc-review">
        <div class="desc-header">
          <h2> Customer Review </h2>
          <img src="./../../Asset/moustache w line.svg" />
        </div>
        <div class="user-review">
          <div class="review1">
            <img src="./../../Asset/user bima.svg" alt="Bima" />
            <h2>Beem Chad</h2>
            <p>BOEKBER sangat bermanfaat untuk saya,
              saya jadi tidak perlu mengantri panjang
              untuk mendapatkan cukuran terbaik untuk
              rambut saya</p>
          </div>
          <div class="review2">
            <img src="../../Asset/user dika.svg" alt="Dika" />
            <h2>Dhika Chad</h2>
            <p>BOEKBER sangat bermanfaat untuk saya,
              saya jadi tidak perlu mengantri panjang
              untuk mendapatkan cukuran terbaik untuk
              rambut saya</p>
          </div>
          <div class="review3">
            <img src="../../Asset/user giras.svg" alt="Giras" />
            <h2>Giras Chad</h2>
            <p>BOEKBER sangat bermanfaat untuk saya,
              saya jadi tidak perlu mengantri panjang
              untuk mendapatkan cukuran terbaik untuk
              rambut saya
            </p>
          </div>
        </div>
    </span>
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
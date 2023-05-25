<?php
session_start();
include("../../Component/Configuration/configuration.php");
if (!isset($_SESSION['Username'])) {
    header("Location: ../../Features/Login/Login.php");
}

$iduser = $_SESSION["id"];
$QueryID = mysqli_query($con, "SELECT * FROM user WHERE id = '$iduser'");
$QueryHistory = mysqli_query($con, "SELECT * FROM confirmation WHERE iduser = '$iduser'");

if (isset($_POST['submit'])) {
    $toko = $_POST['Toko_Pilihan'];
    $tokoresult = mysqli_query($con, "SELECT * FROM tempat_cukur WHERE Nama_Toko = '$toko'");
    $baristoko = mysqli_fetch_assoc($tokoresult);
    $idToko = $baristoko['idToko'];

    $barber = $_POST['Barber_Pilihan'];
    $barberresult = mysqli_query($con, "SELECT * FROM tukang_cukur WHERE nama_barber = '$barber'");
    $barisbarber = mysqli_fetch_assoc($barberresult);
    $idBarber = $barisbarber['idBarber'];

    $Nama = $_POST['NamaLengkap'];
    $Tanggal = $_POST['Tanggal'];
    $Jam = $_POST['Jam'];
    $Telepon = $_POST['Phone_Number'];
    $idUser = $_SESSION['id'];

    mysqli_query($con, "INSERT INTO confirmation VALUES ('','$idUser','$Nama','$Tanggal','$Jam','$Telepon','$idBarber','$barber','$idToko','$toko')");
    $idUser = $_SESSION['id'];
    $res = mysqli_query($con, "SELECT * FROM confirmation WHERE iduser = '$idUser'");
    $baris = mysqli_fetch_assoc($res);
    $_POST['confirmationid'] = $baris['confirmationid'];
    $confirmationID = $_POST['confirmationid'];
    mysqli_query($con, "INSERT INTO History VALUES('','$confirmationID')");
    header("Location: ../../Features/History/History.php");
}
// else {
//    echo "<h2>ERORR</h2>";
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
    <link rel="stylesheet" href="Order.css">
    <link rel="stylesheet" href="../../Component/Footer/Footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abril+Fatface">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=EB+Garamond">
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
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


    <!-- Form section -->
    <section class="order">
        <div class="order-header">
            <div class="return-arrow">
                <a href="../Book/Book.php">
                    <img src="../../Asset/return_arrow.svg">
                </a>
            </div>
            <h1>Order Confirmation</h1>
        </div>
        <div class="order-container">
            <form action="" method="post">
                <div class="order-wrapper-nama-telepon">
                    <div class="order-grid">
                        <div class="order-nama">
                            <h2>Nama Lengkap</h2>
                            <input type="text" name="NamaLengkap" required>
                        </div>
                        <div class="order-telepon">
                            <h2>Nomor Telepon</h2>
                            <input type="text" name="Phone_Number" required>
                        </div>
                    </div>
                </div>

                <div class="order-wrapper-toko-barber">
                    <div class="order-grid">
                        <div class="order-toko">
                            <h2>Pilih Toko</h2>
                            <select name="Toko_Pilihan">
                                <option>Hairgood Barbershop</option>
                                <option>Everyday Barber</option>
                                <option>Sigma Barbershop</option>
                            </select>
                        </div>

                        <div class="order-barber">
                            <h2>Pilih Barber</h2>
                            <select name="Barber_Pilihan">
                                <option>Agus Suryana</option>
                                <option>John Doe</option>
                                <option>Caelus Jade</option>
                            </select>
                        </div>
                        <div class="order-tanggal">
                            <h2>Tanggal Kedatangan</h2>
                            <input type="date" name="Tanggal" required>
                        </div>
                        <div class="order-jam">
                            <h2>Jam Kedatangan</h2>
                            <input type="time" name="Jam" required>
                        </div>
                    </div>
                </div>

                <div class="order-button">
                    <button name="submit" type="submit">Order!</button>
                </div>
            </form>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1341.9692905706263!2d106.73098484173013!3d-6.558171113633961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4b758d5c1b5%3A0x89b0802179c78bdf!2sDepartemen%20Ilmu%20Komputer%20FMIPA%20IPB!5e0!3m2!1sen!2sid!4v1684931234095!5m2!1sen!2sid" width="346" height="206" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <p>copyright ©️ Kelompok 2 RPL 2</p>
        </div>
    </Footer>
</body>

</html>
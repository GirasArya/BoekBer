<?php
session_start();
include("../../Component/Configuration/configuration.php");
if (!isset($_SESSION['Username'])) {
    header("Location: ../../Features/Login/Login.php");
}

$iduser = $_SESSION["id"];
$QueryID = mysqli_query($con, "SELECT * FROM user WHERE id = '$iduser'");
$QueryHistory = mysqli_query($con, "SELECT * FROM confirmation WHERE iduser = '$iduser'");

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
    <link rel="stylesheet" href="History.css">
    <script src="https://kit.fontawesome.com/44003bbbd7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Component/Footer/Footer.css">
    <title>History</title>
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

    <section class="history-container">
        <div class="history-header">
            <h2>
                Order
            </h2>
        </div>
        <table class="history-table">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Nomor Telepon</th>
                    <th>Barbershop</th>
                    <th>Barber</th>
                </tr>
            </thead>
            <tbody class="history-data">

                <?php
                $iduser = $_SESSION["id"];
                $kueri = mysqli_query($con, "SELECT * FROM confirmation WHERE iduser = '$iduser'");



                while ($baris = mysqli_fetch_array($kueri)) {
                    //mengambil id konfirmasi

                    $_POST["confirmationid"] = $baris["confirmationid"];

                    echo "<tr>";


                    echo "<td>" . $baris['NamaLengkap'] . "</td>";
                    echo "<td>" . $baris['Tanggal'] . "</td>";
                    echo "<td>" . $baris['Jam'] . "</td>";
                    echo "<td>" . $baris['Phone_Number'] . "</td>";
                    echo "<td>" . $baris['Toko_Pilihan'] . "</td>";
                    echo "<td>" . $baris['Barber_Pilihan'] . "</td>";

                    echo "<td>";
                    echo "<button>";
                    echo "<a href='hapus.php?id=" . $baris['confirmationid'] . "'><b>Delete</b></a>";
                    echo "</button>";

                    echo "<button>";
                    echo "<a href='edit.php?id=" . $baris['confirmationid'] . "'><b>Edit</b></a>";
                    echo "</button>";
                    echo "</td>";

                    echo "</tr>";
                }


                ?>

            </tbody>
        </table>

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
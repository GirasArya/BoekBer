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
    <title>History</title>
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

    <section class="history-container">
        <table class="history-table">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Phone Number</th>
                    <th>Toko</th>
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
                    echo "<br>";
                    echo "<button>";
                    echo "<a href='edit.php?id=" . $baris['confirmationid'] . "'><b>Edit</b></a>";
                    echo "<button>";
                    echo "</td>";
                    echo "</tr>";
                }


                ?>

            </tbody>
        </table>

    </section>


</body>

</html>
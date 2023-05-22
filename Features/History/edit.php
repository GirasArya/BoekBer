<?php
session_start();
include("../../Component/Configuration/configuration.php");
if (!isset($_SESSION['Username'])) {
    header("Location: ../../Features/Login/Login.php");
}

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

    mysqli_query($con, "UPDATE confirmation SET NamaLengkap = '$Nama', Tanggal = '$Tanggal', Jam = '$Jam', Phone_Number = '$Telepon', Barber_Pilihan = '$barber', Toko_Pilihan = '$toko' ");
    $idUser = $_SESSION['id'];
    $res = mysqli_query($con, "SELECT * FROM confirmation WHERE iduser = '$idUser'");
    $baris = mysqli_fetch_assoc($res);
    $_POST['confirmationid'] = $baris['confirmationid'];
    $confirmationID = $_POST['confirmationid'];
    mysqli_query($con, "INSERT INTO History VALUES('','$confirmationID')");
    header("Location: ../../Features/History/History.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

    <body>
        <!-- Form section -->
        <section>
            <div class="order-container">
                <form action="" method="post">
                    <div class="order-toko-barber">
                        <h2>Pilih Toko</h2>
                        <select name="Toko_Pilihan">
                            <option>Hairgood Barbershop</option>
                            <option>Everyday Barber</option>
                            <option>Sigma Barbershop</option>
                        </select>
                        <h2>Pilih Barber</h2>
                        <select name="Barber_Pilihan">
                            <option>Agus Suryana</option>
                            <option>John Doe</option>
                            <option>Caelus Jade</option>
                        </select>
                    </div>
                    <div class="order-form">
                        <h2>Nama Lengkap</h2>
                        <input type="text" name="NamaLengkap" required>

                        <h2>Tanggal Kedatangan</h2>
                        <input type="date" name="Tanggal" required>

                        <h2>Jam Kedatangan</h2>
                        <input type="time" name="Jam" required>

                        <h2>Phone Number</h2>
                        <input type="text" name="Phone_Number" required>
                    </div>
                    <div class="order-button">
                        <h2>Submit</h2>
                        <button name="submit" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </body>

</html>
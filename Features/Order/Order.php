<?php
session_start();
include("../../Component/Configuration/configuration.php");
if (!isset($_SESSION['Username'])) {
    header("Location: ../../Features/Login/Login.php");
}


$iduser = $_SESSION["id"];
$QueryID = mysqli_query($con, "SELECT * FROM user WHERE id = '$iduser'");


//query add tanggal
if (isset($_POST["submit"])) {
    $date = $_POST["Input-Tanggal"];
    $store = $_POST["Barbershop"];
    $TukangCukur = $_POST["Barber"];
    $result1 = mysqli_query($con, "SELECT * FROM tempat_cukur WHERE Nama_Toko = '$store'");
    $row1 = mysqli_fetch_assoc($result1);
    $orderID = $row1['idOrder'];
    $iduser = $_SESSION["id"];
    mysqli_query($con, "INSERT INTO `order_invoice`(`idOrder`, `Order_detail`, `Store`, `Barber`) VALUES ('','$date','$store','$TukangCukur')");
    $res = mysqli_query($con, "SELECT * FROM confirmation WHERE iduser = '$iduser'");
    $baris1 = mysqli_fetch_assoc($res);
    $_POST['confirmationid'] = $baris1['confirmationid'];
}
else {
    echo "Kode anda salah";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve</title>
</head>

<body>
    <option value=""></option>
    <!-- Form section -->
    <section>
        <div class="order-container">
            <form action="Order.php" method="post">
                <div class="order">
                    <?php
                    $TokoID = 1;
                    echo '<select name="Barbershop" id="Barbershop">';
                    for ($TokoID = 1; $TokoID < 4; $TokoID++) {
                        //looping ambil data toko barber per ID
                        $QueryStore = mysqli_query($con, "SELECT * FROM `tempat_cukur` WHERE idToko = '$TokoID'");
                        while ($Toko_Barber = mysqli_fetch_array($QueryStore)) {
                            echo "<option> $Toko_Barber[Nama_Toko]</option>";
                        }
                        echo '</div>';
                    }
                    echo "</select>";
                    ?>

                    <?php
                    $BarberID = 1;
                    echo '<select name="Barber" id="Barber">';
                    for ($BarberID = 1; $BarberID < 4; $BarberID++) {
                        //looping ambil data toko barber per ID
                        $QueryBarber = mysqli_query($con, "SELECT * FROM `tukang_cukur` WHERE idBarber = '$BarberID'");
                        while ($Barber = mysqli_fetch_array($QueryBarber)) {
                            echo "<option> $Barber[nama_barber]</option>";
                        }
                        echo '</div>';
                    }
                    echo "</select>";
                    ?>
                    </select>
                    <input type="datetime-local" name="Input-Tanggal" id="Tanggal">
                    <Button type="submit">
                        Submit
                    </Button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
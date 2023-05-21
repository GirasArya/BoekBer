<?


session_start();
include('../../Component/Configuration/configuration.php');
if (isset($_POST['submit'])) {
    $toko = $_POST['Toko_Pilihan'];
    $tokoresult = mysqli_query($con, "SELECT * FROM tempat_cukur WHERE Nama_Toko = '$toko'");
    $baristoko = mysqli_fetch_assoc($tokoresult);
    $idToko = $baristoko['idToko'];

    $barber = $_POST['Barber_Pilihan'];
    $barberresult = mysqli_query($con, "SELECT * FROM tukang_cukur WHERE nama_barber = '$barber'");
    $barisbarber = mysqli_fetch_assoc($barberresult);
    $idBarber = $barisbarber['Barberid'];

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
else {
   echo "<h2>ERORR</h2>";
}

?>

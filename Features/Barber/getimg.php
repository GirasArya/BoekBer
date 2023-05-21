<?php
include("../../Component/Configuration/configuration.php");
header('Content-Type: image/png');
for ($imgBarber = 1; $imgBarber < 4;  $imgBarber++ ) {
    $QueryimgBarber = mysqli_query($con, "SELECT `tukangcukur_img` FROM `tukang_cukur` WHERE idBarber = '$imgBarber'");
    //fetch the image data for the specific ID
    $imageBarber = mysqli_fetch_array($QueryimgBarber);
    //output the image data
    echo $imageBarber['tukangcukur_img'];
}
?>
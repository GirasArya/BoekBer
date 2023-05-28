<?php
include("../../Component/Configuration/configuration.php");
header('Content-Type: image/png');
$imgBarbershop = $_GET["id"];
$QueryimgBarbershop = mysqli_query($con, "SELECT `barbershop_img` FROM `tempat_cukur` WHERE idToko = '$imgBarbershop'");
//fetch the image data for the specific ID
$imageBarbershop = mysqli_fetch_array($QueryimgBarbershop);
//output the image data
echo $imageBarbershop['barbershop_img'];



var_dump($imageBarber);

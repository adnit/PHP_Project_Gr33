<?php
require_once('connect.php');
if (!isset($_GET['hallid'])) {
   header("location: ../index.php"); 
}

$hall_id = $_GET['hallid'];
$sql = "SELECT * FROM Salla WHERE SallaId = ?";
$getSallaDetails = $con->prepare($sql);
$getSallaDetails->execute([$hall_id]);

$rows = $getSallaDetails->fetchAll();
foreach($rows as $row) {
    $name_salla = $row['Salla_name'];
    $desc_salla = $row['Salla_desc'];
    $main_pic_salla = $row['Salla_main_img'];
    $sec_pic_salla = $row['Salla_sec_img'];
    $thrd_pic_salla = $row['Salla_thr_img'];
}

?>
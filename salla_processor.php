<?php
require_once('./admin/db_salla-connect.php');


$hall_id = $_GET['hallid'];

$sth = $conn->query("SELECT * FROM Salla WHERE SallaId = '{$hall_id}'");


$rows = $sth->fetchAll();
foreach($rows as $row) {

    $name_salla = $row['Salla_name'];
    $desc_salla = $row['Salla_desc'];
    $main_pic_salla = $row['Salla_main_img'];
    $sec_pic_salla = $row['Salla_sec_img'];
    $thrd_pic_salla = $row['Salla_thr_img'];


}


$counter=$conn->prepare("SELECT SallaId FROM Salla");
$counter->execute();
$nr=$counter->rowCount();

?>
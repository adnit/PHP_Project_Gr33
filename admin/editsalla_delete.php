<?php
require_once('db_salla-connect.php');

$Salla_id = $_POST['Nr_salla'];
$Salla_name = $_POST['Name_salla'];

$status = "OK";
$msg="";

$count=$conn->prepare("SELECT SallaId FROM Salla WHERE SallaId=:sallaid");
$count->bindParam(":sallaid",$Salla_id);
$count->execute();
$no=$count->rowCount();

if($no == 0){
$msg=$msg."Salla me ID të tillë nuk ekziston.<br>";
$status= "NOTOK";
}


$count=$conn->prepare("SELECT Salla_name FROM Salla WHERE Salla_name=:salla_name");
$count->bindParam(":salla_name",$Salla_name);
$count->execute();
$no=$count->rowCount();

if($no == 0){
    $msg=$msg."Salla me emër të tillë nuk ekziston.<br>";
    $status= "NOTOK";
}


if($status=="OK"){

    $delete_data=$conn->prepare("DELETE FROM Salla 
    WHERE SallaId=:sallaid");

    $delete_data->bindParam(':sallaid',$Salla_id);


    try{
        $delete_data->execute();
        $msg = $msg.'Të dhënat e sallës me ID:'.$Salla_id.' janë fshirë me sukses.';
    }
    catch(PDOException $e){
        $e->getMessage();
        $msg = $msg.'Të dhënat e sallës së dhënë nuk janë fshirë me sukses<br>';
    }
}
else {
    $msg = $msg.'<br>Të dhënat e sallës së dhënë nuk janë fshirë me sukses.<br>';
}

echo 
    '<html>
    <body>
    <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
    <p style="font-size:18px; color:black">'.$msg.'</p><hr>
    <a href="editsalla.php" style="font-size:25px">Kliko këtu për të u kthyer në faqen kryesore të sallave</a>
    <body>
    <html>
    ';

?>
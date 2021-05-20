<?php
require_once('db_salla-connect.php');


$Salla_id = $_POST['Nr_salla'];
$Salla_name = $_POST['Name_salla'];
$Salla_desc = $_POST['Desc_salla'];
$Salla_pic1 = $_POST['Pic1_salla'];
$Salla_pic2 = $_POST['Pic2_salla'];
$Salla_pic3 = $_POST['Pic3_salla'];

$status = "OK";
$msg="";


$count=$conn->prepare("SELECT SallaId FROM Salla WHERE SallaId=:sallaid");
$count->bindParam(":sallaid",$Salla_id);
$count->execute();
$no=$count->rowCount();

if($no >0 ){
$msg=$msg."Salla me ID të tillë tashmë ekziston. Regjistroni sallë me ID tjetër.<br>";
$status= "NOTOK";
}

$count=$conn->prepare("SELECT Salla_name FROM Salla WHERE Salla_name=:salla_name");
$count->bindParam(":salla_name",$Salla_name);
$count->execute();
$no=$count->rowCount();

if($no >0 ){
    $msg=$msg."Salla me emër të tillë tashmë ekziston. Regjistroni sallë me emër tjetër.<br>";
    $status= "NOTOK";
}

if ( strlen($Salla_desc) < 500 ){
    $msg=$msg."Pershkrimi i sallës duhet të jetë me së paku 500 karaktere<br>";
    $status= "NOTOK";
}					
   

if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Salla_pic1)) {
    $msg = $msg.'URL e dhënë për foton kryesore të sallës nuk është valide. Ju lutem jepni url-të valide.<br>';
    $status= "NOTOK";
  }

if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Salla_pic2)) {
    $msg = $msg.'URL e dhënë për foton e dytë te sallës nuk është valide. Ju lutem jepni url-të valide.<br>';
    $status= "NOTOK";
}

if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Salla_pic3)) {
    $msg = $msg.'URL e dhënë për foton e tretë të sallës nuk është valide. Ju lutem jepni url-të valide.<br>';
    $status= "NOTOK";
}

$key2 = '.jpg';
if (strpos($Salla_pic1, $key2) == false || strpos($Salla_pic2, $key2) == false || strpos($Salla_pic3, $key2) == false) {
    $msg=$msg.'Url-të e dhëna në fotot e sallës nuk përmbajnë ".jpg". Ju lutem jepni url-të valide.<br>';
    $status="NOTOK";
}

if($status=="OK"){

    $insert_data=$conn->prepare("INSERT INTO Salla(SallaId,Salla_name,Salla_desc,Salla_main_img,Salla_sec_img,Salla_thr_img) 
    VALUES(:sallaid,:sallaemri,:salladesc,:sallapic1,:sallapic2,:sallapic3)");

    $insert_data->bindParam(':sallaid',$Salla_id);

    $insert_data->bindParam(':sallaemri',$Salla_name);

    $insert_data->bindParam(':salladesc',$Salla_desc);

    $insert_data->bindParam(':sallapic1',$Salla_pic1);

    $insert_data->bindParam(':sallapic2',$Salla_pic2);

    $insert_data->bindParam(':sallapic3',$Salla_pic3);

    try{
        $insert_data->execute();
        $msg = $msg.'Të dhënat e sallës së re me ID:'.$Salla_id.' janë ruajtur me sukses.';
    }
    catch(PDOException $e){
        $e->getMessage();
        $msg = $msg.'Të dhënat e sallës së dhënë nuk janë ruajtur me sukses<br>';
    }
}
else {
    $msg = $msg.'<br>Të dhënat e sallës së dhënë nuk janë ruajtur me sukses.<br>';
}

echo 
    '<html>
    <body>
    <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
    <p style="font-size:18px; color:black">'.$msg.'</p><hr>
    <a href="editsalla.html" style="font-size:25px">Kliko këtu për të u kthyer në faqen kryesore të sallave</a>
    <body>
    <html>
    ';
    
?>
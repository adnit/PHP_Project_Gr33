<?php
require_once('connect.php');

$Event_id = $_POST['Nr_eventit'];
$Event_name = $_POST['Name_eventi'];

$status = "OK";
$msg="";

$count=$con->prepare("SELECT EventId FROM Evente WHERE EventId=:eventid");
$count->bindParam(":eventid",$Event_id);
$count->execute();
$no=$count->rowCount();

if($no == 0){
$msg=$msg."Eventi me ID të tillë nuk ekziston.<br>";
$status= "NOTOK";
}


$count=$con->prepare("SELECT EventName FROM Evente WHERE EventName=:event_name");
$count->bindParam(":event_name",$Event_name);
$count->execute();
$no=$count->rowCount();

if($no == 0){
    $msg=$msg."Eventi me emër të tillë nuk ekziston.<br>";
    $status= "NOTOK";
}


if($status=="OK"){

    $delete_data=$con->prepare("DELETE FROM Evente 
    WHERE EventId=:eventid");

    $delete_data->bindParam(':eventid',$Event_id);


    try{
        $delete_data->execute();
        $msg = $msg.'Të dhënat e eventit me ID:'.$Event_id.' janë fshirë me sukses.';
    }
    catch(PDOException $e){
        $e->getMessage();
        $msg = $msg.'Të dhënat e eventit të dhënë nuk janë fshirë me sukses<br>';
    }
}
else {
    $msg = $msg.'<br>Të dhënat e eventit të dhënë nuk janë fshirë me sukses.<br>';
}

echo 
    '<html>
    <body>
    <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
    <p style="font-size:18px; color:black">'.$msg.'</p><hr>
    <a href="editeventet.php" style="font-size:25px">Kliko këtu për të u kthyer në faqen kryesore të eventeve</a>
    <body>
    <html>
    ';

?>
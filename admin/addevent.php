<?php
require_once('connect.php');


$Eventi_id = $_POST['Nr_eventit'];
$Eventi_name = $_POST['Name_eventi'];
$Eventi_desc = $_POST['Desc_eventi'];
$Eventi_pic1 = $_POST['Pic1_eventi'];
$Eventi_duration = $_POST['Duration_eventit'];
$Eventi_start = $POST['Start_eventi'];

$status = "OK";
$msg="";


$count=$con->prepare("SELECT EventId FROM Evente WHERE EventId=:eventid");
$count->bindParam(":eventid",$Eventi_id);
$count->execute();
$no=$count->rowCount();

if($no >0 ){
$msg=$msg."Eventi me ID të tillë tashmë ekziston. Regjistroni event me ID tjetër.<br>";
$status= "NOTOK";
}

$count=$con->prepare("SELECT EventName FROM Evente WHERE EventName=:event_name");
$count->bindParam(":event_name",$Eventi_name);
$count->execute();
$no=$count->rowCount();

if($no >0 ){
    $msg=$msg."Eventi me emër të tillë tashmë ekziston. Regjistroni event me emër tjetër.<br>";
    $status= "NOTOK";
}

if ( strlen($Eventi_desc) < 1000 ){
    $msg=$msg."Pershkrimi i eventit duhet të jetë me së paku 1000 karaktere<br>";
    $status= "NOTOK";
}					
   

if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Eventi_pic1)) {
    $msg = $msg.'URL e dhënë për foton kryesore të eventit nuk është valide. Ju lutem jepni url-të valide.<br>';
    $status= "NOTOK";
  }


$key2 = '.jpg';
if (strpos($Eventi_pic1, $key2) == false ) {
    $msg=$msg.'Url-të e dhëna në fotot e eventit nuk përmbajnë ".jpg". Ju lutem jepni url-të valide.<br>';
    $status="NOTOK";
}

$month = date('m', strtotime($Eventi_start));
$day = date('d', strtotime($Eventi_start));
$year = date('y', strtotime($Eventi_start));

if($year < date('y') || ($year = date('y') && $month < date('m')) || ($year = date('y') && $month = date('m') && $day < date('d'))){
    $msg = $msg.'Eventi duhet te jete ne ditet e ardhshme.<br>';
    $status="NOTOK";
}

if($Eventi_duration < 0) {
    $msg.$msg.'Kohezgjatja duhet te jete nr pozitiv!<br>';
    $status="NOTOK";
}

if($status=="OK"){

    $insert_data=$con->prepare("INSERT INTO Evente(EventId, EventName, EventText, EventStart, EventDuration, EventImg) 
    VALUES(:eventid,:eventemri,:eventdesc,:eventstart,:eventdur,:eventpic)");

    $insert_data->bindParam(':eventid',$Eventi_id);

    $insert_data->bindParam(':eventemri',$Eventi_name);

    $insert_data->bindParam(':eventdesc',$Eventi_desc);

    $insert_data->bindParam(':eventpic',$Eventi_pic1);

    $insert_data->bindParam(':eventdur',$Eventi_duration);

    $insert_data->bindParam(':eventstart',$Eventi_start);

    try{
        $insert_data->execute();
        $msg = $msg.'Të dhënat e eventit te ri me ID:'.$Eventi_id.' janë ruajtur me sukses.';
    }
    catch(PDOException $e){
        $e->getMessage();
        $msg = $msg.'Të dhënat e eventit të dhënë nuk janë ruajtur me sukses<br>';
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
    <a href="editeventet.php" style="font-size:25px">Kliko këtu për të u kthyer në faqen kryesore të eventeve</a>
    <body>
    <html>
    ';
    
?>
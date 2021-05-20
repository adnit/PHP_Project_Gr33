<?php

include 'connect.php';

if(isset($_POST["submit"])){
try{
    $firstname = $_POST['FirstName'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];
    $test = "insert into Contact(FirstName,Email,Message) Values(:firstname, :email,:message)";

    $query = $con -> prepare($test);
    $query -> execute([
    ":firstname" => $firstname,
    ":email" => $email,
    ":message" => $message
    ]);

    echo 'Te dhenat u insertuan me sukses';
}
    catch(PDOException $e){
    die('Error' . $e->getMessage());
    }
    catch (Exception $e) {
    die('General Error: '.$e->getMessage());
    }
    try {
    require "sendmail.php";
    $newuser = new SendEmail($email);
    if($newuser->sendContact($firstname)){
        unset($newuser);
        echo 'U dergua emaili';
        header("location: ../kontakto.php");
    }else{
        echo 'Dergimi i emailes deshtoi';
    }}
    catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
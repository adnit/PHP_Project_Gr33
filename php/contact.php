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
        $subject = 'No Reply-KinoFiek';
        $message =
        '<html><body>
        <h3>Pershendetje ' . $firstname . ",</h3>". '<p>Ne kemi pranuar mesazhin tuaj dhe me ane te kesaj emaile ju informojme qe do te pergjigjjemi ne kerkesen tuaj ne kohen me te shpejte te mundur.</p>
        <p>Faleminderit qe gjetet kohen per te na kontaktuar.</p>
        <h3>Kjo eshte nje email e automatizuar, ju lutemi mos beni reply.</h3></body></html>';
        ;
        $headers = 'From:kinofiek@gmail.com' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        if (mail($email, $subject, $message, $headers)) {
            echo 'U dergua emaili';
            header("location: ../kontakto.php");
        }
        else{
            echo 'Dergimi i emailes deshtoi';
        }
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }

}
?>
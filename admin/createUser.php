<?php
require_once('connect.php');
$titles = [
    "Secret",
    "Anonymous",
    "Wild"
    ];
$animals = [
    "Albatross",
    "Alligator",
    "Ant",
    "Bat",
    "Bear",
    "Bee",
    "Butterfly",
    "Camel",
    "Cat",
    "Caterpillar",
    "Cobra",
    "Crab",
    "Crocodile",
    "Crow",
    "Deer",
    "Dinosaur",
    "Dolphin",
    "Dove",
    "Dragonfly",
    "Duck",
    "Eagle",
    "Elephant",
    "Falcon",
    "Fish",
    "Fox",
    "Frog",
    "Gazelle",
    "Giraffe",
    "Goat",
    "Goldfish",
    "Gorilla",
    "Hamster",
    "Horse",
    "Hummingbird",
    "Jaguar",
    "Jellyfish",
    "Kangaroo",
    "Koala",
    "Leopard",
    "Lion",
    "Llama",
    "Mantis",
    "Monkey",
    "Mouse",
    "Octopus",
    "Ostrich",
    "Owl",
    "Panther",
    "Parrot",
    "Pelican",
    "Penguin",
    "Pigeon",
    "Rabbit",
    "Raccoon",
    "Salamander",
    "Scorpion",
    "Seahorse",
    "Shark",
    "Sheep",
    "Snail",
    "Snake",
    "Spider",
    "Squirrel",
    "Tiger",
    "Turtle",
    "Viper",
    "Vulture",
    "Whale",
    "Wolf",
    "Wolverine",
    "Zebra"
];

$firstNames = [ "Adnit", "Albin", "Albina", "Albion", "Arlind", "Flamur", "Drin", "Endrit", "Qlirim", "Valon", "Luan", "Njomza", "Dardan", "Ylber", "Albiona", "Kreshnik", "Butrint", "Toska", "Ardit", "Rinor", "Vlera", "Olti", "Enea", "Lind", "Edon", "Blina", "Urim", "Ora", "Artin", "Doruntina", "Veranda", "Lendrit", "Era"];

$lastNames = ["Kamberi","Gashi","Krasniqi", "Hoti", "Berisha", "Morina", "Shala", "Tahiri","Hajdari"];



$firstLastName = $_POST["firstLastName"];
$username = $_POST["username"];
$email = $_POST["email"];
$passwordTemp = $_POST["password"];
$password = password_hash($passwordTemp, PASSWORD_DEFAULT);
$hash = md5(rand(0, 3333));

$query = $con->prepare("SELECT UserId FROM Users WHERE Username = :username");
$query1 = $con->prepare("SELECT UserId FROM Users WHERE Email = :email");

$query->bindParam(':username', $username);
$query1->bindParam(':email', $email);

$query->execute();
$query1->execute();

$usernameFetch = $query->fetchAll();
$emailFetch = $query1->fetchAll();

if($username == ""){
  $randIndex = array_rand($titles);
  $randIndex2 = array_rand($animals);
  $username = $titles[$randIndex].$animals[$randIndex2].rand(100,999);
}
if($firstLastName == ""){
  $randIndex = array_rand($firstNames);
  $randIndex2 = array_rand($lastNames);
  $firstLastName = $firstNames[$randIndex].' '.$lastNames[$randIndex2];
}

if ($usernameFetch != null || $emailFetch != null) {
  $_SESSION["RegisterError"] = "Username or email already in use";
  header('location: ../register.php');
} else {
  $sqlQuery = "INSERT INTO users(username, email, password, hash, FirstLastName) VALUES(:username, :email, :password, :hash, :firstlastname)";
  $sqlInsert = $con->prepare($sqlQuery);
  $sqlInsert->bindParam(':username', $username);
  $sqlInsert->bindParam(':email', $email);
  $sqlInsert->bindParam(':password', $password);
  $sqlInsert->bindParam(':hash', $hash);
  $sqlInsert->bindParam(':firstlastname', $firstLastName);


  // insert a row
  $sqlInsert->execute();


  $email = "adnit.kamberi@student.uni-pr.edu ";
  $subject = 'Signup | Verification';

  $message =
    '
<html>
<body>
  <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
  Pershendetje <strong>' . $username . '</strong>, faleminderit qe u regjistruat ne KinoFIEK! <br><br>
  Llogaria juaj eshte krijuar, per te perdorur te gjitha sherbimet e kinemase tone ju duhet
  verifikoni accountin tuaj duke klikuar linkun me poshte. <br>
  Keto jane te dhenat tuaja: <br>
  ++++++++++++++++++++++++ <br>
  email:   '.$email.' <br>
  username:'.$username.' <br> 
  ++++++++++++++++++++++++
  Kliko <strong><a href = "http://www.adnit.com/verify.php?email='. $email . '&hash=' . $hash . '">ketu</a></strong>.
  <hr>
  Nese linku me larte nuk funksionon kopjoni kete link ne browserin tuaj: <a href="http://www.adnit.com/verify.php?email=' . $email . '&hash=' . $hash . '">http://www.adnit.com/verify.php?email='. $email . '&hash=' . $hash . '</a>
</body>
</html>
';
  $headers = 'From:adnitk01@gmail.com' . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf-8\r\n";

  if (mail($email, $subject, $message, $headers)) {
  } else {
    echo "Email sending failed...";
    echo $message;
  }

  $_SESSION["username"] = $username;
  $_SESSION["password"] = $password;
  $_SESSION["user_type"] = "user";

  header('location: ../verify.php');
}
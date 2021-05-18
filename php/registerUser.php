<?php
  namespace Verot\Upload;
  include('./php/checkState.php');
  require_once 'connect.php';
  require_once './class.upload.php';
  

  if (isset($_POST['email']) && isset($_POST['password'])) {
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

    $firstNames = ["Adnit", "Albin", "Albina", "Albion", "Arlind", "Flamur", "Drin", "Endrit", "Qlirim", "Valon", "Luan", "Njomza", "Dardan", "Ylber", "Albiona", "Kreshnik", "Butrint", "Toska", "Ardit", "Rinor", "Vlera", "Olti", "Enea", "Lind", "Edon", "Blina", "Urim", "Ora", "Artin", "Doruntina", "Veranda", "Lendrit", "Era"];

    $lastNames = ["Kamberi", "Gashi", "Krasniqi", "Hoti", "Berisha", "Morina", "Shala", "Tahiri", "Hajdari"];

    $firstLastName = $_POST["firstLastName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $passwordTemp = $_POST["password"];
    $password = password_hash($passwordTemp, PASSWORD_DEFAULT);
    $hash = md5(rand(0, 3333));
    $avatar = "";
    $forceRedirect = false;
    if(isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
    $handle = new Upload($_FILES['uploadedFile']);
      if ($handle->uploaded) {
        if(!($handle->file_is_image)){
          $forceRedirect = true;
        }else{
          $newFileName = md5(time() . $handle->file_src_name_body);
          $handle->file_new_name_body    = $newFileName;  
          $handle->image_resize          = true;
          $handle->image_ratio_crop      = true;
          $handle->image_y               = 100;
          $handle->image_x               = 100;
          header('Content-type: ' . $handle->file_src_mime);
          $handle->process('../assets/img/avatars');
          if ($handle->processed) {
            $avatar = $handle->file_dst_pathname;
            $handle->clean();
          } else {
            $avatar = $handle->error;
          }
        }
      }
    }
    if ($forceRedirect) {
      $_SESSION["RegisterError"] = "Format i uploadur i pa pranuar";
      header('location: ../register.php');
    }else{
      
    $query = $con->prepare("SELECT UserId FROM Users WHERE Username = :username");
    $query1 = $con->prepare("SELECT UserId FROM Users WHERE Email = :email");

    $query->bindParam(':username', $username);
    $query1->bindParam(':email', $email);

    $query->execute();
    $query1->execute();

    $usernameFetch = $query->fetchAll();
    $emailFetch = $query1->fetchAll();

    if ($username == "") {
      $randIndex = array_rand($titles);
      $randIndex2 = array_rand($animals);
      $username = $titles[$randIndex] . $animals[$randIndex2] . rand(100, 999);
    }
    if ($firstLastName == "") {
      $randIndex = array_rand($firstNames);
      $randIndex2 = array_rand($lastNames);
      $firstLastName = $firstNames[$randIndex] . ' ' . $lastNames[$randIndex2];
    }

    if ($usernameFetch != null || $emailFetch != null) {
      $_SESSION["RegisterError"] = "Username ose email ne perdorim";
      header('location: ../register.php');
    } else {
      $website = "localhost";
      $sqlQuery = "INSERT INTO users(username, email, password, hash, FirstLastName, UserAvatar) VALUES(:username, :email, :password, :hash, :firstlastname, :avatar)";
      $sqlInsert = $con->prepare($sqlQuery);
      $sqlInsert->bindParam(':username', $username);
      $sqlInsert->bindParam(':email', $email);
      $sqlInsert->bindParam(':password', $password);
      $sqlInsert->bindParam(':hash', $hash);
      $sqlInsert->bindParam(':firstlastname', $firstLastName);
      $sqlInsert->bindParam(':avatar', $avatar);

      $sqlInsert->execute();
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
          email:   ' . $email . ' <br>
          username:' . $username . ' <br> 
          ++++++++++++++++++++++++ <br>
          <h3> Kliko <strong><a href = "' . $website . '/verify.php?email=' . $email . '&hash=' . $hash . '">ketu</a></strong>. </h3>
          <hr>
          Nese linku me larte nuk funksionon kopjoni kete link ne browserin tuaj: <a href="' . $website . '/verify.php?email=' . $email . '&hash=' . $hash . '">http://www.adnit.com/verify.php?email=' . $email . '&hash=' . $hash . '</a>
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
      $_SESSION['justRegistered'] = 'Po';
      header('location: ./intro.php');
    }
    }
  }
  ?>
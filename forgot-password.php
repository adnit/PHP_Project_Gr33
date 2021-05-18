 <?php
include('./php/checkState.php');
require_once('./php/connect.php');

if(isset($_POST['username'])){
  $username = $_POST['username'];
  $sql = "SELECT * FROM users WHERE Username= ?";
  $checkifUserExists = $con->prepare($sql);
  $checkifUserExists->execute([$username]);
  $data = $checkifUserExists->fetch();
  if ($data == null) {
		$_SESSION['resetError'] = "Ky username nuk egziston, regjistrohu <strong> <a href='register.php'>ketu</a> </strong>.";
	}else{
    $username = $data['Username'];
    $email = $data['Email'];
    $expiryTime = 5;
    $hash = md5(rand(0, 1234));
    $expirydate = date('Y-m-d H:i:s', time() + ($expiryTime * 60));
    echo $expirydate;
    $sql = "INSERT INTO `resetpassword` (`Username`, `Hash`, `is_expired`, `expiry_date`) VALUES (?,?,?,?)";
    $sqlInsert = $con->prepare($sql);
    if($sqlInsert->execute([$username, $hash, 0, $expirydate])){
      $website = "localhost";
      $sql = "UPDATE users SET ResetHash=? WHERE Username=?";
      $con->prepare($sql)->execute([$hash, $username]);
      $subject = 'Reset Password | Request';
      $message =
      '
      <html>
      <body>
      <img style="width:100%; height:200px; object-fit:contain" src = "https://kinofiek.online/images/KinoFiekMetaData.png"> <hr>
      Pershendetje <strong>' . $username . '</strong>,<br>
      Keni kerkuar qe te resetoni fjalekalimin e llogarise tuaj, klikoni linkun me poshte per te resetuar fjalekalimin tuaj<br>
      <h3> Kliko <strong><a href = "' .$website. '/reset.php?username='. $username . '&hash=' . $hash . '">ketu</a></strong>. </h3>
      <hr>
      Nese linku me larte nuk funksionon kopjoni kete link ne browserin tuaj: <a href="' .$website. '/reset.php?username='. $username . '&hash=' . $hash . '">localhost/reset.php?username='. $username . '&hash=' . $hash . '</a>
      </body>
      </html>
      ';
      $headers = 'From:adnitk01@gmail.com' . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=utf-8\r\n";
      if (mail($email, $subject, $message, $headers)) {
        $_SESSION['resetSuccess'] = 'Yes';
        header("location: ./intro.php");
      } else {
        $_SESSION['resetError'] = 'Emaili nuk u dergua kontakto info@kinofiek.com';
      }
      }
    }
    

    
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Reseto Fjalekalimin - KinoFiek</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
  </head>
  <body
    class="bg-gradient-primary"
    style="
      background: linear-gradient(
          rgb(46, 57, 88),
          rgb(44, 51, 71) 72%,
          rgb(46, 57, 88) 80%,
          rgb(46, 57, 88)
        ),
        rgb(46, 57, 88);
    "
  >
    <div class="container" style="margin-top: 16%">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-6 d-none d-lg-flex">
                  <div
                    class="flex-grow-1 bg-login-image"
                    style="
                      background: url('assets/img/poster.jpg') center / cover
                        no-repeat;
                    "
                  ></div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h4 class="text-dark mb-4">Keni harruar fjalekalimin?</h4>
                    </div>
                    <form class="user" method="post">
                      <div class="mb-3">
                        <input
                          class="form-control form-control-user"
                          type="text"
                          id="username"
                          required=""
                          name="username"
                          placeholder="Shkruani username"
                        />
                      </div>
<div class="alert alert-success d-none" role="alert" id="alert" style="
                      text-align: center;
                      color: rgb(255, 255, 255);
                      background: var(--bs-danger);
                      border-radius: 8px;
                    ">
                  <span><strong>
                    <?php
                      if ($_SESSION['resetError']!= '') {
                    ?>
                        <script language="javascript">
                          document.getElementById("alert").classList.remove("d-none");
                        </script>
                    <?php
                    }
                    echo $_SESSION['resetError'];
                    unset($_SESSION['resetError']);
                    ?>
                    </strong><br /></span>
                </div>  
                      <button
                        class="btn btn-primary d-block btn-user w-100"
                        type="submit"
                      >
                        Dergo emailin per fjalekalim
                      </button>
                      <hr />
                    </form>
                    <div class="text-center">
                      <a class="small" href="login.php">Kyqu ne llogari</a>
                    </div>
                    <div class="text-center">
                      <a class="small" href="register.php"
                        >Krijo nje account</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>
</html>

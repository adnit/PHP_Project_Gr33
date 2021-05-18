<?php

  require_once('./php/connect.php');
  include('./php/checkState.php');

if(isset($_POST['email'])){
  $email = $_POST["email"];
  $sql = "SELECT * FROM users WHERE Email= :email";
  $checkmail = $con->prepare($sql);
	$checkmail->bindParam(':email', $email);
	$checkmail->execute();
	$data = $checkmail->fetch();
	 
	if ($data == null) {
		$_SESSION['error'] = "Ky email nuk egziston, regjistrohu <strong> <a href='index.php'>ketu</a> </strong>.";
	}else{
  $website = "localhost";
  $subject = 'Signup | Verification';
  $username = $data['Username'];
  $hash = $data['HASH'];
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
  ++++++++++++++++++++++++ <br>
  <h3> Kliko <strong><a href = "' .$website. '/reset.php?email='. $email . '&hash=' . $hash . '">ketu</a></strong>. </h3>
  <hr>
  Nese linku me larte nuk funksionon kopjoni kete link ne browserin tuaj: <a href="' .$website. '/verify.php?email=' . $email . '&hash=' . $hash . '">http://www.adnit.com/verify.php?email='. $email . '&hash=' . $hash . '</a>
  </body>
  </html>
  ';
  $headers = 'From:adnitk01@gmail.com' . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=utf-8\r\n";
  if (mail($email, $subject, $message, $headers)) {
  $_SESSION['success'] = 'Emaili verifikues u dergua!';
    
  } else {
    $_SESSION['error'] = 'Emaili nuk u dergua kontakto info@kinofiek.com';
  }
}}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Verifikimi - KinoFiek</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap/css/bootstrap.min.css?h=4bd99c004583b712cfdf6a080dcc0ff4"
    />
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
    <link
      rel="stylesheet"
      href="assets/fonts/fontawesome5-overrides.min.css?h=23ca7688ff5c9ff6852b395e86f65a82"
    />
    <link
      rel="stylesheet"
      href="assets/css/styles.min.css?h=a910a13b97a60cf55424e1bd9ec6a991"
    />
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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10 col-xxl-6">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-6 col-xl-12">
                  <div class="p-5">
                    <div class="text-center">
                    <?php
                      if(isset($_SESSION['justRegistered'])){
                        echo '<h4 class="text-dark mb-2">
                        Ju lutem shikoni emailin tuaj per te&nbsp;<br />aktivizuar
                        llogarinte tuaj ne KinoFIEK!
                      </h4>
                      <p class="mb-4">
                        Nese emaili nuk ka ardhur brenda 3 minutave shtypeni
                        email poshte dhe ridergo emailin verifikues
                      </p>';
                      $_SESSION['justRegistered'] = null;
                      }elseif(isset($_SESSION['resetSuccess'])) {
                        echo '<h4 class="text-dark mb-2">
                        Ju lutem shikoni emailin tuaj per te resetuar fjalekalimin tuaj <br>
                        <strong> Ky email per resetim eshte aktiv vetem 5 minuta </strong>
                      </h4>
                      ';
                      }else{
                        echo '<h4 class="text-dark mb-2">
                        Emaili juaj verifikues nuk ka ardhur ende?
                      </h4>
                      <p class="mb-4">
                        Shtypeni emailin me poshte dhe ridergo emailin verifikues
                      </p>';
                      }
                    ?>
                    </div>
                    <form method="POST" class="user" id='forma1'>
                      <div class="mb-3">
                        <input
                          class="form-control form-control-user"
                          type="email"
                          id="exampleInputEmail"
                          aria-describedby="emailHelp"
                          placeholder="Email address"
                          name="email"
                        />
                      </div>
                        <?php
                      if (isset($_SESSION['resetSuccess'])) {
                    ?>
                        <script language="javascript">
                          document.getElementById("forma1").style.display = 'none';
                        </script>
                        
                    <?php
                    $_SESSION['resetSuccess'] = null;
                    } ?>
                       <div class="alert alert-success d-none" role="alert" id="succesalert" style="
                      text-align: center;
                      height: 50px;
                      color: rgb(255, 255, 255);
                      background: var(--bs-success);
                      border-radius: 8px;
                    ">
                  <span><strong>
                    <?php
                      if ($_SESSION['success']!= '') {
                    ?>
                        <script language="javascript">
                          document.getElementById("succesalert").classList.remove("d-none");
                        </script>
                    <?php
                    }
                    echo $_SESSION['success'];
                    $_SESSION['success'] = null ?>
                    </strong><br /></span>
                </div>
                      <div class="alert alert-success d-none" role="alert" id="alert" style="
                      text-align: center;
                      height: 50px;
                      color: rgb(255, 255, 255);
                      background: var(--bs-danger);
                      border-radius: 8px;
                    ">
                  <span><strong>
                    <?php
                      if ($_SESSION['error']!= '') {
                    ?>
                        <script language="javascript">
                          document.getElementById("alert").classList.remove("d-none");
                        </script>
                    <?php
                    }
                    echo $_SESSION['error'];
                    $_SESSION['error'] = null ?>
                    </strong><br /></span>
                </div>
                      <button
                        class="btn btn-primary d-block btn-user w-100"
                        type="submit"
                      >
                        Ridergo email
                      </button>
                    </form>
                    <div class="text-center">
                      <hr />
                      <a class="small" href="./login.php"
                        >Kyqu</a
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/script.min.js?h=185aa1983d884cdd024472091400126a"></script>
  </body>
</html>

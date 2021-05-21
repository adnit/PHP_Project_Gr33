<?php
$email = $_GET["email"];
$hash = $_GET["hash"];

if($email == null || $hash== null){
  header('location: ./index.php');
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
    <title>Verifiko Llogarine - KinoFiek</title>
    <link
      rel="stylesheet"
      href="assets/bootstrap/css/bootstrap.min.css?h=3e038198d2e8be61d4d7d64177a2793b"
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
      href="assets/fonts/fontawesome5-overrides.min.css?h=2cbf12caab31562d03bae9544edcad5f"
    />
    <link
      rel="stylesheet"
      href="assets/css/styles.min.css?h=a910a13b97a60cf55424e1bd9ec6a991"
    />
  </head>
  <body class="bg-gradient-primary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
              <div class="row">
              
                <div class="col-lg-6 col-xl-12 col-xxl-12 offset-xl-0">
                  <div class="p-5">
                    <div class="text-center">
                    
                      <?php

require_once('./php/connect.php');


$email = $_GET["email"];
$hash = $_GET["hash"];

$stmt = $con->prepare("SELECT * FROM users WHERE email=? and hash=? and
                      Activeac=?"); $stmt->execute([$email, $hash, 0]);
                      $user = $stmt->fetch(); $matches
                      = $stmt->rowCount(); if($matches > 0){ $sql = "UPDATE
                      users SET Activeac=? WHERE email=? and hash=? and
                      Activeac=?"; $stmt= $con->prepare($sql);
                      $stmt->execute([1, $email, $hash, 0]);
                      echo '
                      <h4 class="text-dark mb-2" id="title">
                        Miresevjen ne KinoFIEK <strong>'. $user['Username'] . '</strong>
                      </h4>
                      <p id="subtitle" class="mb-4">
                        Keto jane disa prej sherbimeve qe ofron kinemaja jone:
                      </p>
                      '; }else{ 
                        echo '
                      <h4 class="text-dark mb-2" id="title">
                        Ka ndodhur ndonje gabim gjate verifikimit 
                      </h4>
                      <p id="subtitle" class="mb-4">
                        Emaili nuk egziston apo veqse eshte aktivizuar
                      </p>
                      ';
                      } ?>
                      <a href="./index.php" style="margin-bottom: 10px;" class="btn btn-success btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fas fa-home"></i></span><span class="text-white text">Ballina</span></a>
                    </div>
                    
                    <div id="todo">
                      <!-- Start: Features Boxed -->
                      <section class="features-boxed">
                        <div class="container" id="stuff">
                          <!-- Start: Features -->
                          <div class="row justify-content-center features">
                            <div class="col-sm-6 col-md-5 col-lg-4 item">
                              <div class="box">
                                <i class="fas fa-photo-video icon"></i>
                                <h3 class="name">Katalogu i filmave</h3>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-5 col-lg-4 item">
                              <div class="box">
                                <i class="fa fa-clock-o icon"></i>
                                <h3 class="name">24/7 Trailers</h3>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-5 col-lg-4 item">
                              <div class="box">
                                <i class="fa fa-list-alt icon"></i>
                                <h3 class="name">Timeline</h3>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-5 col-lg-4 item">
                              <div class="box">
                                <i class="fas fa-street-view icon"></i>
                                <h3 class="name">Reviews</h3>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-5 col-lg-4 item">
                              <div class="box">
                                <i class="fas fa-envelope-open-text icon"></i>
                                <h3 class="name">Qasje ne evente</h3>
                              </div>
                            </div>
                            <div class="col-sm-6 col-md-5 col-lg-4 item">
                              <div class="box">
                                <i class="fa fa-comments icon"></i>
                                <h3 class="name">Shpreh mendimin tend</h3>
                              </div>
                            </div>
                          </div>
                          <!-- End: Features -->
                        </div>
                      </section>
                      <!-- End: Features Boxed -->
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
    <script src="assets/js/script.min.js?h=185aa1983d884cdd024472091400126a"></script>
  </body>
</html>

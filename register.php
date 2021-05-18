<!DOCTYPE html>
<?php 
  require_once './php/connect.php';
?>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
  <title>Regjistrohu - Kinofiek</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
</head>
<body class="bg-gradient-primary" style="
      background: linear-gradient(
          rgb(46, 57, 88),
          rgb(44, 51, 71) 72%,
          rgb(46, 57, 88) 80%,
          rgb(46, 57, 88)
        ),
        rgb(46, 57, 88);
    ">
  <div class="container" style="margin-top: 14%">
    <div class="card shadow-lg o-hidden border-0 my-5">
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-flex">
            <div class="flex-grow-1 bg-register-image" style="
                  background: url('assets/img/poster.jpg') center / cover
                    no-repeat;
                "></div>
          </div>
          <div class="col-lg-7">
            <div class="p-5" style="margin-top: 34px">
              <div class="text-center">
                <h4 class="text-dark mb-4">Krijoni llogarine tuaj</h4>
              </div>
              <form class="user" action="./php/registerUser.php" enctype="multipart/form-data" method="post">
                <div class="row mb-3">
                  <div class="col-sm-6 mb-3 mb-sm-0"><input class="form-control form-control-user" type="text" id="firstLastName" placeholder="Emri Mbiemri" name="firstLastName"></div>
                  <div class="col-sm-6"><input class="form-control form-control-user" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="username" placeholder="Username" name="username" pattern="^[a-zA-Z0-9_.-]*$" title="Shtypni vetem shkronja numra . dhe _ (nese leni te zbrazet do ju ipet nje random)"></div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-6 col-xl-7 mb-3 mb-sm-0"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" required=""></div>
                  <div class="col-sm-6 col-xl-4 offset-xl-0"><label class="form-label" style="font-size: 15px;">Fotoja e profilit</label><input class="form-control" name="uploadedFile" accept="image/png, image/jpeg" type="file" style="height: 35px;width: 197.3px;"></div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input class="form-control form-control-user" type="password" id="password" placeholder="Fjalekalimi" name="password" required="" minlength="6" />
                  </div>
                  <div class="col-sm-6">
                    <input class="form-control form-control-user" type="password" id="passwordRepeat" placeholder="Perseritni Fjalekalimin" name="passwordRepeat" required="" />
                  </div>
                </div>
                <div class="alert alert-success d-none" role="alert" id="alert" style="
                      text-align: center;
                      color: rgb(255, 255, 255);
                      background: var(--bs-danger);
                      border-radius: 8px;
                    ">
                  <span><strong>
                      <?php
                      if ($_SESSION['RegisterError'] != '') {
                      ?>
                        <script language="javascript">
                          document.getElementById("alert").classList.remove("d-none");
                        </script>
                      <?php
                      }
                      echo $_SESSION['RegisterError'];
                      unset($_SESSION['RegisterError']) ?>
                    </strong><br /></span>
                </div>
                <button class="btn btn-primary d-block btn-user w-100" id="submit" type="submit">
                  Krijo account
                </button>
                <hr />
              </form>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Keni harruar fjalekalimin?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Keni nje llogari? Kyqu</a>
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
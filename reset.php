<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>KinoFIEK - Reseto fjalekalimin</title>
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
        <div class="col-md-9 col-lg-12 col-xl-10 col-xxl-5">
          <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12 col-xl-12">
                  <div class="p-5">
                    <div class="text-center">
                      <?php
                      require_once('./php/connect.php');
                      if(isset($_SESSION['success'])){
                        echo '
                      <h4 class="text-dark mb-2" id="title">
                        Fjalekalimi juaj eshte resetuar me sukses
                      </h4>
                      <p id="subtitle" class="mb-4">
                        Kyqyni me fjalekalimin e ri <strong><a href="./login.php"> ketu</a></strong>.
                      </p>';
                        unset($_SESSION['success']);
                      }else{
                      if (isset($_POST['password'])){
                        if (isset($_SESSION["username"]) && isset($_SESSION["resethash"])){
                          $username = $_SESSION["username"];
                          $hash = $_SESSION["resethash"];
                          $passwordTemp = $_POST["password"];
                          $password = password_hash($passwordTemp, PASSWORD_DEFAULT);
                          $sql = "UPDATE users SET ResetHash=?, PASSWORD=? WHERE Username=? and ResetHash=?";
                          $con->prepare($sql)->execute([null, $password, $username, $hash]);
                          $stmt = $con->prepare("DELETE FROM resetpassword WHERE hash =:hash");
                          $stmt->bindValue(':hash', $hash);
                          $stmt->execute();
                          unset($_SESSION['username']);
                          unset($_SESSION['resethash']);
                          $_SESSION['success'] = "Y";
                          header("location: ./reset.php");
                        }else{
                          echo '
                      <h4 class="text-dark mb-2" id="title">
                        Ka ndodhur ndonje gabim gjate resetimit 
                      </h4>
                      <p id="subtitle" class="mb-4">
                        Provoni te dergoni edhe nje here kerkesen per resetim <strong><a href="./forgot-password.php"> ketu</a></strong>.
                      </p>';
                        }
                        
                      }

                      $email = $_GET["username"];
                      $hash = $_GET["hash"];
                      $stmt = $con->prepare("SELECT * FROM resetpassword WHERE username=? and hash=? and is_expired=?");
                      $stmt->execute([$email, $hash, 0]);
                      $user = $stmt->fetch();
                      $matches = $stmt->rowCount();
                      $expirydate = $user['expiry_date'];
                      $now = date('Y-m-d H:i:s', time());
                      if($matches == 1 && $now >= $expirydate){
                        $stmt = $con->prepare("DELETE FROM resetpassword WHERE hash =:hash");
                        $stmt->bindValue(':hash', $hash);
                        $stmt->execute();
                       echo '
                      <h4 class="text-dark mb-2" id="title">
                        Emaili juaj per verifikim ka skaduar pasi kane kaluar 5 minuta
                      </h4>
                      <p id="subtitle" class="mb-4">
                        Ju lutem dergoni edhe nje here kerkesen per resetim <strong><a href="./forgot-password.php"> ketu</a></strong>.
                      </p>';}
                      else if($matches ==  1 && !($now >= $expirydate)){
                        $_SESSION["username"] = $user['Username'];
                        $_SESSION["resethash"] = $hash;
                        echo '
                      <h4 class="text-dark mb-2" id="title">
                        Shtypeni fjalekalimin tuaj te ri <strong>'. $user['Username'] . '</strong>
                      </h4>
                      <form id="forma" class="user" method="post">
                      <div class="mb-3">
                        <input type="password" id="password" placeholder="Password" name="password" required="" minlength="3"
                          class="form-control form-control-user"
                        />
                      </div>                    
                      <button
                        class="btn btn-primary d-block btn-user w-100"
                        type="submit"
                      >
                        Ndrysho fjalekalimin
                      </button>
                      <hr />
                    </form>
                      '; 
                      }
                      else{ 
                    echo '
                      <h4 class="text-dark mb-2" id="title">
                        Ka ndodhur ndonje gabim gjate resetimit 
                      </h4>
                      <p id="subtitle" class="mb-4">
                        Provoni te dergoni edhe nje here kerkesen per resetim <strong><a href="./forgot-password.php"> ketu</a></strong>.
                      </p>';
                      }            
                     } ?>
                      
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

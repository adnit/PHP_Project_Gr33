<!DOCTYPE html>
<html>
<?php


$firstLastName = $_POST["firstLastName"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
	$sql = "SELECT * FROM users WHERE username= :username";

				$insertSql = $con->prepare($sql);

				$insertSql->bindParam(':username', $username);
				$insertSql->execute();

				$data = $insertSql->fetch();
				 
				if ($data == null) {
					$_SESSION['error'] = "Wrong Username !";
					$_SESSION['error1'] = " The username was not found in the server.";
					header('location: ../index.php');	
				}else{
					$passwordHashed = password_hash($password, PASSWORD_DEFAULT);
					if (password_verify($password, $data['password'])) {
						$_SESSION["username"] = $username;
						$_SESSION["password"] = $password;
						$_SESSION["id"] = $data['id'];
						$_SESSION["email"] = $data['email'];
						$_SESSION["user_type"] = $data['type'];
						if ($data['type'] == "user") {
							header('location: ../intro.php');
							var_dump($data["type"]);
						}else if ($data['type'] == "admin") {
							header('location: ../dashboardAdmin.php');
						}
					} else{
						$_SESSION['error'] = "Wrong Password !";
						var_dump("nice");
						$_SESSION['error1'] = " The username and password dont match.";
						header('location: ../index.php');
					}
				}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>Login - Brand</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary" style="background: linear-gradient(rgb(46,57,88), rgb(44,51,71) 72%, rgb(46,57,88) 80%, rgb(46,57,88)), rgb(46,57,88);">
  <div class="container" style="margin-top: 128px;">
    <div class="row justify-content-center">
      <div class="col-md-9 col-lg-12 col-xl-10">
        <div class="card shadow-lg o-hidden border-0 my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-flex">
                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;assets/img/poster.jpg&quot;) center / cover space;"></div>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h4 class="text-dark mb-4">Mire se erdhet</h4>
                  </div>
                  <form class="user" action="/login.php" method="post">
                    <div class="mb-3"><input class="form-control form-control-user" type="text" id="username" required="" name="username" placeholder="Shkruani username"></div>
                    <div class="mb-3"><input class="form-control form-control-user" type="password" id="password" placeholder="Fjalekalimi" name="password" required=""></div>
                    <div class="mb-3">
                      <div class="custom-control custom-checkbox small">
                        <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" id="remember" for="formCheck-1" name="remember">Remember Me</label></div>
                      </div>
                    </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                    <hr>
                  </form>
                  <div class="text-center"><a class="small" href="forgot-password.html">Keni harruar fjalekalimin?</a></div>
                  <div class="text-center"><a class="small" href="register.html">Krijo nje account</a></div>
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
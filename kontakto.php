<?php

include 'connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>KinoFIEK - Kontakti</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lora"
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
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
    />
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      .input-group{
        display: none;
      }
    </style>
  </head>
  <body id="page-top">
    <div id="wrapper">
    <?php include("./views/navbar.php") ?>
          <div class="container-fluid">
            <section class="getintouch">
              <div class="container modern-form">
                <div class="text-center">
                  <h4 style="color: #212529; font-size: 45px">
                    Kontakto me KinoFIEK
                  </h4>
                </div>
                <hr class="modern-form__hr" />
                <div class="modern-form__form-container">
                  <form action="" method="POST">
                    <div class="row">
                      <div class="col col-contact">
                        <div
                          class="
                            modern-form__form-group--padding-r
                            form-group
                            mb-3
                          "
                        >
                          <input
                            class="form-control input input-tr"
                            type="text"
                            name="FirstName"
                            placeholder="First Name"
                            required
                          />
                          <div class="line-box"><div class="line"></div></div>
                        </div>
                      </div>
                      <div class="col col-contact">
                        <div
                          class="
                            modern-form__form-group--padding-l
                            form-group
                            mb-3
                          "
                        >
                          <input
                            class="form-control input input-tr"
                            type="email"
                            placeholder="Email"
                            name="Email"
                            required
                          />
                          <div class="line-box"><div class="line"></div></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div
                          class="
                            modern-form__form-group--padding-t
                            form-group
                            mb-3
                          "
                        >
                          <textarea
                            class="
                              form-control
                              input
                              modern-form__form-control--textarea
                            "
                            name="Message"
                            placeholder="Message"
                            required
                          ></textarea>
                          <div class="line-box"><div class="line"></div></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-center">
                        <input
                          class="btn btn-primary submit-now"
                          type="submit"
                          name="submit"
                        >
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php
    if(isset($_POST["submit"])){
          $firstname = $_POST['FirstName'];
          $email = $_POST['Email'];
          $message = $_POST['Message'];
          $status = true;
          if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            $status = false;
            echo "<h4 style='text-align:center'>Nuk keni shkruar vetem shkronja dhe spaces ne emer.</h4>";
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $status = false;
            echo "<h4 style='text-align:center'>Formati i emailes eshte i gabuar.</h4>";
          }
          if(!preg_match("/^[a-zA-Z-' ]*$/",$firstname)|| !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<h4 style='text-align:center'>Provoni te dergoni te dhenat perseri.</h4>";
          }

          if($status){
            try{
          $test = "insert into Contact(FirstName,Email,Message) Values(:firstname, :email,:message)";
          $query = $con -> prepare($test);
          $query -> execute([
          ":firstname" => $firstname,
          ":email" => $email,
          ":message" => $message
          ]);}
          catch(PDOException $e){
            die('Error' . $e->getMessage());
            }
            catch (Exception $e) {
            die('General Error: '.$e->getMessage());
            }
          try {
              require 'php/sendmail.php';
              $Contact = new SendEmail($email);
              if($Contact->sendContact($firstname)){
                unset($Contact);
                echo '<h4 style="text-align:center">Te dhenat u derguan me sukses!</h4>';
            }else{
              echo '<h4 style="text-align:center">Pati nje gabim gjate dergimit te te dhenave. Ju lutem ridergoni te dhenat perseri.</h4>';
            }}
          catch (Exception $e) {
              echo $e->getMessage();
          }
        }
      }
      ?>
            </section>
          </div>
        </div>
        <footer class="bg-white sticky-footer">
          <div class="container my-auto">
            <div class="text-center my-auto copyright">
              <span>Copyright © Brand 2021</span>
            </div>
          </div>
        </footer>
      </div>
      <a class="border rounded d-inline scroll-to-top" href="#page-top"
        ><i class="fas fa-angle-up"></i
      ></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>

  </body>
</html>

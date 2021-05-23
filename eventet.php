<?php
include "php/connect.php";
include "php/eventsQuerys.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <title> Evente | KinoFiek </title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" />
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
        <link rel="stylesheet" href="assets/css/styles.min.css" />
           <style>
        .input-group{
            display: none;
        }
        </style>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php
                include "./views/navbar.php";
            ?>
                    <div class="container-fluid">
                        <div class="d-sm-flex justify-content-between align-items-center mb-4"><h3 class="text-dark mb-0">Eventet</h3></div>
                        <div class="row">
                            
                                <?php
                                    tani($con);
                                    gjithsejEvente($con);
                                    perdoruesit($con);
                                ?>
                            
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center" style="height:60px;">
                                <h6 class="text-primary fw-bold m-0">Eventi qe eshte duke ndodhur tani</h6>
                            </div>
                            <?php
                            
                            eventiAktual($con);
                            ?>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-body" style="object-fit: contain;">
                                <div class="blog-home2 py-5">
                                    <div class="container">
                                        
                                        <div class="row justify-content-center">
                                        
                                            <div class="col-md-8 text-center">
                                                <h3 class="my-3">Eventet e ardhshme</h3>
                                                <h6 class="subtitle font-weight-normal">Eventet qe do te ndodhin gjate diteve ne vazhdim!</h6>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                        <?php
                                        eventetEArdhshme($con);
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="bg-white sticky-footer">
                    <div class="container my-auto">
                        <div class="text-center my-auto copyright"><span>Copyright - KinoFiek 2021</span></div>
                    </div>
                </footer>
            </div>
            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.min.js"></script>
      
    </body>
</html>

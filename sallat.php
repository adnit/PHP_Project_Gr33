<?php
require_once('salla_processor.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Dashboard - Brand</title><link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/sallat.css">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php
                include('./views/navbar.php');
            ?>
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Sallat</h3>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Sallat ku jane duke u shfaqur filmat</h6>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                                <i class="fas fa-ellipsis-v text-gray-400"></i>
                            </button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p>
                                <a class="dropdown-item" href="#">&nbsp;Action</a>
                                <a class="dropdown-item" href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="object-fit: contain;">
                    <?php
                            $msg = '<div class="row product-list">' ;
                            $name = 'A'; 
                            for($i = 1; $i <= $nr; $i++){
                                if($i % 3 == 1){
                                    $msg = $msg.'</div><div class="row product-list">';
                                } 
                                if($i != 1){
                                    $name++;
                                }
                                
                                $msg = $msg.'<div class="col-sm-6 col-md-4 product-item">
                                <div class="product-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a class="product-image" href="salla_details.php?hallid='.$i.'">
                                                <img src="assets/images/sallax.jpg" style="width:100%; height:100%;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <h2 style="color:black">
                                               Salla '.$name.'
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="btn btn-light" type="button" onclick="location.href=\'salla_details.php?hallid='.$i.'\'" >Shiko</button>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                            }
                            $msg = $msg.'</div>';
                            echo $msg;

                        ?> 
                         
                    </div>
                </div>
                <div class="card shadow mb-4"></div>
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
    <a class="border rounded d-inline scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up">
        </i>
    </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="assets/js/script.min.js"></script>
    </body>
</html>
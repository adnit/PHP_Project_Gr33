<?php
require_once('salla_processor.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Dashboard - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <?php
                include('./views/navbar.php')
            ?>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php 
                                            echo '<img class="img-thumbnail img-fluid center-block" src="'.$main_pic_salla.'"">';
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <?php
                                            echo '<img class="img-thumbnail img-fluid center-block" src="'.$sec_pic_salla.'">';
                                        ?>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <?php
                                            echo '<img class="img-thumbnail img-fluid center-block" src="'.$thrd_pic_salla.'">';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <h1 style="font-size: 24.7px; color:black"><?php echo $name_salla;?></h1>
                                <p>
                                    <?php 
                                    echo $desc_salla;
                                    ?>                                    
                                </p>
                                <a class="btn btn-danger btn-lg center-block" type="button" href="eventet.php">
                                    Shiko Eventet
                                </a>
                            </div>
                        </div>
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
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/script.min.js"></script>
    </body>
</html>
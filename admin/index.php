<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Dashboard - Brand</title>
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css"
    />
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <style>

      .div-link{
        color: inherit;
        text-decoration: inherit;
      }

    </style>
  </head>
  <body id="page-top">
    <div id="wrapper">
      <?php
      include("../views/navbar_admin.php");
      require_once("../php/connect.php");
      
      $sqlE = "SELECT COUNT(*) AS totalEvents FROM Evente";
      $sqlM = "SELECT COUNT(*) AS totalMovies FROM Movies";
      $sqlU = "SELECT COUNT(*) AS totalUsers FROM Users";
      $sqlS = "SELECT COUNT(*) AS totalSalla FROM Sallat";

      $prepE = $con->prepare($sqlE);
      $prepE->execute();
      $resultE = $prepE->fetch(PDO::FETCH_ASSOC);

      $prepM = $con->prepare($sqlM);
      $prepM->execute();
      $resultM = $prepM->fetch(PDO::FETCH_ASSOC);

      $prepU = $con->prepare($sqlU);
      $prepU->execute();
      $resultU = $prepU->fetch(PDO::FETCH_ASSOC);
      
      $prepS = $con->prepare($sqlS);
      $prepS->execute();
      $resultS = $prepS->fetch(PDO::FETCH_ASSOC);
      ?>
          <div class="container-fluid">
            <div
              class="d-sm-flex justify-content-between align-items-center mb-4"
            >
              <h3 class="text-dark mb-0">KinoFiek - Admin Panel</h3>
            </div>
            <div class="row">
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-primary py-2">
                <a class="div-link" href="movies.php">
                    <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div
                          class="
                            text-uppercase text-primary
                            fw-bold
                            text-xs
                            mb-1
                          "
                        >
                          <span>Filma</span>
                        </div>
                        <div class="text-dark fw-bold h5 mb-0">
                          <span><?php echo $resultM['totalMovies'] ?></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i
                          class="material-icons fa-2x text-gray-300"
                          style="font-size: 38px"
                          >movie</i
                        >
                      </div>
                    </div>
                  </div>
                </a>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                  <a class="div-link" href="users.php">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div
                          class="
                            text-uppercase text-success
                            fw-bold
                            text-xs
                            mb-1
                          "
                        >
                          <span>Perdorues</span>
                        </div>
                        <div class="text-dark fw-bold h5 mb-0">
                          <span><?php echo $resultU['totalUsers'] ?></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
    </a>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-info py-2">
                  <a class="div-link" href="events.php">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div
                          class="text-uppercase text-info fw-bold text-xs mb-1"
                        >
                          <span>Evente</span>
                        </div>
                        <div class="row g-0 align-items-center">
                          <div class="col-auto">
                            <div class="text-dark fw-bold h5 mb-0 me-3">
                              <span><?php echo $resultE['totalEvents'] ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="far fa-calendar-alt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
    </a>
                </div>
              </div>
              <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-warning py-2">
                  <a class="div-link" href="sallat.php">
                  <div class="card-body">
                    <div class="row align-items-center no-gutters">
                      <div class="col me-2">
                        <div
                          class="
                            text-uppercase text-warning
                            fw-bold
                            text-xs
                            mb-1
                          "
                        >
                          <span>SAlla</span>
                        </div>
                        <div class="text-dark fw-bold h5 mb-0">
                          <span><?php echo $resultS['totalSalla'] ?></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="typcn typcn-th-small fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
    </a>
                </div>
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
      <a class="border rounded d-inline scroll-to-top" href="#page-top"
        ><i class="fas fa-angle-up"></i
      ></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>
</html>

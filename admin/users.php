
<?php
require_once('../php/session.php');
if(isset($_SESSION["user_type"]) && $_SESSION["user_type"]=="ADMIN"){

}else{
  header("location: ../index.php");
}
require_once('../php/connect.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Users - KinoFiek</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
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
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body id="page-top">
    <div id="wrapper">
    <nav
        class="
          navbar navbar-dark
          align-items-start
          sidebar sidebar-dark
          accordion
          bg-gradient-primary
          p-0
        "
      >
        <div class="container-fluid d-flex flex-column p-0">
          <a
            class="
              navbar-brand
              d-flex
              justify-content-center
              align-items-center
              sidebar-brand
              m-0
            "
            href="#"
            ><div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-cogs"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><span>Kinofiek</span></div></a
          >
          <hr class="sidebar-divider my-0" />
          <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
              <a class="nav-link" href="index.php"
                ><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="movies.php"
                ><i class="fas fa-user"></i><span>Filmat</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="editsalla.php"
                ><i class="fas fa-table"></i><span>Sallat</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="editeventet.php"
                ><i class="far fa-user-circle"></i><span>Eventet</span></a
              >
            </li>
          </ul>
          <div class="text-center d-none d-md-inline">
            <button
              class="btn rounded-circle border-0"
              id="sidebarToggle"
              type="button"
            ></button>
          </div>
        </div>
      </nav>
      <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
          <nav
            class="
              navbar navbar-light navbar-expand
              bg-white
              shadow
              mb-4
              topbar
              static-top
            "
          >
            <div class="container-fluid">
              <button
                class="btn btn-link d-md-none rounded-circle me-3"
                id="sidebarToggleTop"
                type="button"
              >
                <i class="fas fa-bars"></i>
              </button>
              
              <ul class="navbar-nav flex-nowrap ms-auto">
                <li class="nav-item dropdown d-sm-none no-arrow">
                  <a
                    class="dropdown-toggle nav-link"
                    aria-expanded="false"
                    data-bs-toggle="dropdown"
                    href="#"
                    ><i class="fas fa-search"></i
                  ></a>
                  <div
                    class="
                      dropdown-menu dropdown-menu-end
                      p-3
                      animated--grow-in
                    "
                    aria-labelledby="searchDropdown"
                  >
                    <form class="me-auto navbar-search w-100">
                      <div class="input-group">
                        <input
                          class="bg-light form-control border-0 small"
                          type="text"
                          placeholder="Search for ..."
                        />
                        <div class="input-group-append">
                          <button class="btn btn-primary py-0" type="button">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>
                <?php echo '<li class="nav-item dropdown no-arrow">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      >
                      ';
                    if (isset($_SESSION["firstlast"])) {
                      echo 
                      '
                        <span class="d-none d-lg-inline me-2 text-gray-600 small"
                        >'.$_SESSION["firstlast"].'</span
                      ><img
                        class="border rounded-circle img-profile"
                        src="'.$_SESSION["avatar"].'"
                    />
                      ';
                    }else {
                      echo '<span class="d-none d-lg-inline me-2 text-gray-600 small"
                        >Ju nuk jeni kyqur</span
                      ><img
                        class="border rounded-circle img-profile"
                        src="assets/img/avatars/avatar-default.png"
                    />';
                    }

                    echo '
                    </a>
                    <div
                      class="
                        dropdown-menu
                        shadow
                        dropdown-menu-end
                        animated--grow-in
                      "
                    >';

                    if (isset($_SESSION["firstlast"])) {
                      echo '
                      <a class="dropdown-item" href="/profile.php"
                        ><i
                          class="fas fa-user fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Profile</a
                      >';
                      if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "ADMIN"){
                        echo '
                      <a class="dropdown-item" href="index.php"
                        ><i
                          class="
                            fas
                            fa-cog fa-sm fa-fw
                            me-2
                            text-gray-400
                          "
                        ></i
                        >&nbsp;Admin Panel</a
                      >
                    ';
                      }

                        echo 
                        '
                        <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/logout.php"
                        ><i
                          class="
                            fas
                            fa-sign-out-alt fa-sm fa-fw
                            me-2
                            text-gray-400
                          "
                        ></i
                        >&nbsp;Logout</a
                      >
                    ';
                    

                      }else {
                      echo '
                      <a class="dropdown-item" href="/login.php"
                        ><i
                          class="fas fa-key fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Kyqu</a
                      ><a class="dropdown-item" href="/register.php"
                        ><i
                          class="fas fa-clipboard-check fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Regjistrohu</a
                      >
                    ';
                    }

                  echo '
                  </div>
                </li>'; ?>
              </ul>
            </div>
          </nav>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Perderuesit</h3>
            <div class="card shadow">
              <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">List e perderuesit</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6 text-nowrap">
                    <div
                      id="dataTable_length"
                      class="dataTables_length"
                      aria-controls="dataTable"
                    >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div
                      class="text-md-end dataTables_filter"
                      id="dataTable_filter"
                    >
                    </div>
                  </div>
                </div>
                <div
                  class="table-responsive table mt-2"
                  id="dataTable"
                  role="grid"
                  aria-describedby="dataTable_info"
                >
                  <table class="table my-0" id="dataTable">
                    <thead>
                      <tr>
                        <th>Emri i perderuesit</th>
                        <th>Email</th>
                        <th>Tipi</th>
                      </tr>
                    </thead>
                    <tbody id="tablebody1">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="bg-white sticky-footer">
          <div class="container my-auto">
            <div class="text-center my-auto copyright">
              <span>Copyright - KinoFiek 2021</span>
            </div>
          </div>
        </footer>
      </div>
      <a class="border rounded d-inline scroll-to-top" href="#page-top"
        ><i class="fas fa-angle-up"></i
      ></a>
    </div>
    <script>
    $('#searchmovie').keyup(function(){
            var text = $(this).val();
            $('#tablebody1').html(" ");
            if( text != ""){
            $.ajax({
                type: "GET",
                url: '../php/getmoviestable.php',
                data: 'txt=' + text,
                success: function(data){
                    $('#tablebody1').append(data);
                }
            })
            }
          else{
            $.ajax({
              type: "GET",
              url: '../php/getallusers.php',
              success: function(data){
                  $('#tablebody1').append(data);
              }
            })
          }});
          $(document).ready(function(){
            $.ajax({
              type: "GET",
              url: '../php/getallusers.php',
              success: function(data){
                  $('#tablebody1').append(data);
              }
            })
          })
            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>
</html>

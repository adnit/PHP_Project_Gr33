
<?php
require_once('connect.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Table - Movies</title>
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
    <style>
          .input-group li a:hover {
  cursor: pointer;
}
#results {
  z-index: 99;

  backdrop-filter: blur(50px);

  width: 250px;
  position: absolute;
  list-style-type: none;
  margin-top: 45px;
  border-radius: 4px;
  border-top: 0px;
  }

#results li {
  display: flex;
  flex-direction: column;
  margin: 3px;
  }

#results img {
  float: left;
  height: 50px;
  width: 100px;
  object-fit: cover;
  border-radius: 3px;
  }

.mvtitle {
  float: right;
  vertical-align: middle;
  margin: 8% 0;
  }

#results a {
  color: var(--text-color);
  float: left;
  margin-bottom: 0%;
  width: fit-content;
  text-decoration: none;
  }
#results a:visited {
  color: var(--text-color);
  }
  #searchmovie {
  background-image: url(/images/searchIcon.png);
  color: var(--text-color);
  background-position: 96% 6px;
  background-size: 23px;
  padding: 3% 5% 3% 5%;
  background-color: var(--search-bg);
  box-sizing: border-box;
  border-radius: 4px;
  border: 1px solid #ccc;
  font-size: 1.1em;
  background-repeat: no-repeat;
  width: 100%;
  transition: width 0.4s ease-in-out;
}

#searchmovie:hover {
  width: 100%;
  padding: 3% 5% 3% 5%;
}
#searchmovie:focus {
  width: 100%;
  padding: 3% 5% 3% 5%;
  border: 1px solid #d6d6d6;
}
    </style>
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
              <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"><span>Brand</span></div></a
          >
          <hr class="sidebar-divider my-0" />
          <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
              <a class="nav-link" href="index.html"
                ><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html"
                ><i class="fas fa-user"></i><span>Profile</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="table.html"
                ><i class="fas fa-table"></i><span>Table</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html"
                ><i class="far fa-user-circle"></i><span>Login</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html"
                ><i class="fas fa-user-circle"></i><span>Register</span></a
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
              <form
                class="
                  d-none d-sm-inline-block
                  me-auto
                  ms-md-3
                  my-2 my-md-0
                  mw-100
                  navbar-search
                "
              >
                <div class="input-group">
                  <input
                  id="searchmovie"
                    class="bg-light form-control border-0 small"
                    type="text"
                    placeholder="Kerkoni Filmin"
                  />
                  <ul id="results"></ul>
                </div>
              </form>
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
                  </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      ><span class="badge bg-danger badge-counter">3+</span
                      ><i class="fas fa-bell fa-fw"></i
                    ></a>
                    <div
                      class="
                        dropdown-menu dropdown-menu-end dropdown-list
                        animated--grow-in
                      "
                    >
                      <h6 class="dropdown-header">alerts center</h6>
                      <a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="me-3">
                          <div class="bg-primary icon-circle">
                            <i class="fas fa-file-alt text-white"></i>
                          </div>
                        </div>
                        <div>
                          <span class="small text-gray-500"
                            >December 12, 2019</span
                          >
                          <p>A new monthly report is ready to download!</p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="me-3">
                          <div class="bg-success icon-circle">
                            <i class="fas fa-donate text-white"></i>
                          </div>
                        </div>
                        <div>
                          <span class="small text-gray-500"
                            >December 7, 2019</span
                          >
                          <p>$290.29 has been deposited into your account!</p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="me-3">
                          <div class="bg-warning icon-circle">
                            <i
                              class="fas fa-exclamation-triangle text-white"
                            ></i>
                          </div>
                        </div>
                        <div>
                          <span class="small text-gray-500"
                            >December 2, 2019</span
                          >
                          <p>
                            Spending Alert: We've noticed unusually high
                            spending for your account.
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item text-center small text-gray-500"
                        href="#"
                        >Show All Alerts</a
                      >
                    </div>
                  </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      ><span class="badge bg-danger badge-counter">7</span
                      ><i class="fas fa-envelope fa-fw"></i
                    ></a>
                    <div
                      class="
                        dropdown-menu dropdown-menu-end dropdown-list
                        animated--grow-in
                      "
                    >
                      <h6 class="dropdown-header">alerts center</h6>
                      <a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar4.jpeg"
                          />
                          <div class="bg-success status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >Hi there! I am wondering if you can help me with
                              a problem I've been having.</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">
                            Emily Fowler - 58m
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar2.jpeg"
                          />
                          <div class="status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >I have the photos that you ordered last
                              month!</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar3.jpeg"
                          />
                          <div class="bg-warning status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >Last month's report looks great, I am very happy
                              with the progress so far, keep up the good
                              work!</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">
                            Morgan Alvarez - 2d
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item d-flex align-items-center"
                        href="#"
                        ><div class="dropdown-list-image me-3">
                          <img
                            class="rounded-circle"
                            src="assets/img/avatars/avatar5.jpeg"
                          />
                          <div class="bg-success status-indicator"></div>
                        </div>
                        <div class="fw-bold">
                          <div class="text-truncate">
                            <span
                              >Am I a good boy? The reason I ask is because
                              someone told me that people say this to all dogs,
                              even if they aren't good...</span
                            >
                          </div>
                          <p class="small text-gray-500 mb-0">
                            Chicken the Dog · 2w
                          </p>
                        </div></a
                      ><a
                        class="dropdown-item text-center small text-gray-500"
                        href="#"
                        >Show All Alerts</a
                      >
                    </div>
                  </div>
                  <div
                    class="shadow dropdown-list dropdown-menu dropdown-menu-end"
                    aria-labelledby="alertsDropdown"
                  ></div>
                </li>
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                  <div class="nav-item dropdown no-arrow">
                    <a
                      class="dropdown-toggle nav-link"
                      aria-expanded="false"
                      data-bs-toggle="dropdown"
                      href="#"
                      ><span class="d-none d-lg-inline me-2 text-gray-600 small"
                        >Valerie Luna</span
                      ><img
                        class="border rounded-circle img-profile"
                        src="assets/img/avatars/avatar1.jpeg"
                    /></a>
                    <div
                      class="
                        dropdown-menu
                        shadow
                        dropdown-menu-end
                        animated--grow-in
                      "
                    >
                      <a class="dropdown-item" href="#"
                        ><i
                          class="fas fa-user fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Profile</a
                      ><a class="dropdown-item" href="#"
                        ><i
                          class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Settings</a
                      ><a class="dropdown-item" href="#"
                        ><i
                          class="fas fa-list fa-sm fa-fw me-2 text-gray-400"
                        ></i
                        >&nbsp;Activity log</a
                      >
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#"
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
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Movies</h3>
            <div class="card shadow">
              <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Movies List</p>
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
                        <th>Movie Name</th>
                        <th>Studio</th>
                        <th>Year</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
            $query = $con -> prepare('Select * from movies order by createdat desc');
            $query -> execute();
            while($movie = $query ->fetch(PDO::FETCH_ASSOC)){
              echo '<tr><td><a href="EditMovie?'.$movie["MovieId"].'"><img class="rounded-circle me-2" width="30" height="30" src="'.$movie["Poster"].'">'.$movie["Emri"].'<br></a></td><td>'.$movie["Studio"] .'</td>
              <td>'.$movie['Viti'] .'</td></tr>';
          }
                      ?>
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
              <span>Copyright © Brand 2021</span>
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
            $('#results').html(" ");
            if( text != ""){
            $.ajax({
                type: "GET",
                url: '../php/search.php',
                data: 'txt=' + text,
                success: function(data){
                    $('#results').append(data);
                }
            })
            }});
            </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
  </body>
</html>
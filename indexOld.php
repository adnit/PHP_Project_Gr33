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
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <style>
    .input-group li a:hover {
  cursor: pointer;
}
.row > *{
  width: 33%;
}
.card > picture > img{
  margin-left: 0.7rem;
}
.card-title{
  text-align: center;
}
#results {
  z-index: 99;

  backdrop-filter: blur(150px);

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
  margin-left: -0.7rem;
  }

.mvtitle {
  float: right;
  vertical-align: middle;
  margin: 8% 0;
  font-size: 0.7rem;
  margin-left: 0.7rem;
  }

#results a {
  color: rgb(0, 0, 0);
  float: left;
  margin-bottom: 0%;
  width: fit-content;
  text-decoration: none;
  }
#results a:visited {
  color: rgb(0, 0, 0);
  }
  #searchmovie {
  background-image: url(/images/searchIcon.png);
  color: rgb(0, 0, 0);
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
.card > picture > img{
  height: 250px;
  width: 300px;
  object-fit: cover;
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
              <i class="material-icons">local_movies</i>
            </div>
            <div class="sidebar-brand-text mx-3"><span>kinofiek</span></div></a
          >
          <hr class="sidebar-divider my-0" />
          <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
              <a class="nav-link active" href="index.html"
                ><i class="fas fa-tachometer-alt"></i><span>Ballina</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="evente.html"
                ><i class="fas fa-user"></i><span>Evente</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sallat.html"
                ><i class="fas fa-table"></i><span>Sallat</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="kontakto.html"
                ><i class="far fa-user-circle"></i><span>Kontakti</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about%20EDIT!!!.html"
                ><i class="fas fa-user-circle"></i
                ><span>Rreth kinemase tone</span></a
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
            <div
              class="d-sm-flex justify-content-between align-items-center mb-4"
            >
              <h3 class="text-dark mb-0">Ballina</h3>
            </div>
            <div class="card shadow mb-4">
              <div
                class="
                  card-header
                  d-flex
                  justify-content-between
                  align-items-center
                "
              >
                <h6 class="text-primary fw-bold m-0">
                  Filmat me te shikuar kete jave
                </h6>
              </div>
              <div class="card-body" style="object-fit: contain">
                <div
                  class="carousel slide"
                  data-bs-ride="carousel"
                  id="carousel-1"
                  style="height: 509.7px"
                >
                  <div class="carousel-inner" style="height: 100%">
                    <!-- <div class="carousel-item active" style="height: 100%">
                      <img
                        class="w-100 d-block"
                        src="assets/img/dogs/image2.jpeg"
                        alt="Slide Image"
                        style="height: 100%"
                      />
                    </div>
                    <div class="carousel-item" style="height: 100%">
                      <img
                        class="w-100 d-block"
                        src="assets/img/dogs/image3.jpeg"
                        alt="Slide Image"
                        style="height: 100%"
                      />
                    </div>
                    <div class="carousel-item">
                      <img
                        class="w-100 d-block"
                        src="the-hobbit-the-desolation-of-smaug-2013-movie-banner-poster.jpg"
                        alt="Slide Image"
                      />
                    </div> -->
                  </div>
                  <div>
                    <a
                      class="carousel-control-prev"
                      href="#carousel-1"
                      role="button"
                      data-bs-slide="prev"
                      ><span class="carousel-control-prev-icon"></span
                      ><span class="visually-hidden">Previous</span></a
                    ><a
                      class="carousel-control-next"
                      href="#carousel-1"
                      role="button"
                      data-bs-slide="next"
                      ><span class="carousel-control-next-icon"></span
                      ><span class="visually-hidden">Next</span></a
                    >
                  </div>
                  <ol class="carousel-indicators">
                    <li
                      data-bs-target="#carousel-1"
                      data-bs-slide-to="0"
                      class="active"
                    ></li>
                    <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
              <div
                class="
                  card-header
                  d-flex
                  justify-content-between
                  align-items-center
                "
              >
                <h6 class="text-primary fw-bold m-0">Katalogu</h6>
                <div class="dropdown no-arrow">
                  <button
                    class="btn btn-link btn-sm dropdown-toggle"
                    aria-expanded="false"
                    data-bs-toggle="dropdown"
                    type="button"
                  >
                    <i class="fas fa-ellipsis-v text-gray-400"></i>
                  </button>
                  <div
                    class="
                      dropdown-menu
                      shadow
                      dropdown-menu-end
                      animated--fade-in
                    "
                  >
                    <p class="text-center dropdown-header">dropdown header:</p>
                    <a class="dropdown-item" href="#">&nbsp;Action</a
                    ><a class="dropdown-item" href="#">&nbsp;Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                      >&nbsp;Something else here</a
                    >
                  </div>
                </div>
              </div>
              <div class="card-body" style="object-fit: contain">
                <div>
                  <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link active"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-1"
                        >Action</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-2"
                        >Comedy</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-3"
                        >Romance</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-8"
                        >Thriller</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-7"
                        >Mystery</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-6"
                        >Drama</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-5"
                        >Documentary</a
                      >
                    </li>
                    <li class="nav-item" role="presentation">
                      <a
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="pill"
                        href="#tab-4"
                        >Sport</a
                      >
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                        <script
                          async=""
                          src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"
                          integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D"
                          crossorigin="anonymous"
                        ></script>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-2">
                      <p>Content for tab 2.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-3">
                      <p>Content for tab 3.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-8">
                      <p>Tab content.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-7">
                      <p>Tab content.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-6">
                      <p>Tab content.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-5">
                      <p>Tab content.</p>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="tab-4">
                      <p>Tab content.</p>
                    </div>
                  </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/script.min.js"></script>
    <script src="./assets/js/setmovieid.js"></script>
    <script>
    $(document).ready(function(){
      var kategoria = "Action";
      $.ajax({
        type:"GET",
        url: './php/catalog.php',
        data: 'txt='+kategoria,
        success: function(data){
          $('#tab-1').append(data);
        }
      })
    })
    $(".nav-link").click(function () {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
        var id = $(this).prop('href');
        var kategoria = $(this).text();
        var t = id.split("#");
        $(".tab-pane").removeClass("active");
        $('#'+ t[1]).addClass("active");
        $(".tab-pane").empty();
        $.ajax({
          type: "GET",
          url: './php/catalog.php',
          data: 'txt=' + kategoria,
          success: function(data){
            $('#'+ t[1]).append(data);
          }
        })
    });
    $('#searchmovie').keyup(function(){
            var text = $(this).val();
            $('#results').html(" ");
            if( text != ""){
            $.ajax({
                type: "GET",
                url: './php/search.php',
                data: 'txt=' + text,
                success: function(data){
                    $('#results').append(data);
                }
            })
            }});
      $('document').ready(function(){
        $.ajax({
                type: "GET",
                url: './php/slideshow.php',
                success: function(data){
                    $('.carousel-inner').append(data);
                }
            })
            });
    </script>
  </body>
</html>

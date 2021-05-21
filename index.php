<?php
 require_once('./php/session.php');
 require_once('./php/connect.php');

?>
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
      <?php include("./views/navbar.php") ?>
      
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

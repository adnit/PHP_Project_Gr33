<?php 
  require_once('../php/session.php');
  require_once('../php/connect.php');

  if(isset($_SESSION["user_type"]) && $_SESSION["user_type"]=="ADMIN"){

  }else{
  header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en" style="width: 100%">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Shto filmin - KinoFIEK | Admin</title>
    <meta name="description" content="This is the description" />
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
    <link rel="stylesheet" href="assets/css/styles.min.css" />
  </head>
  <body
    class="bg-gradient-primary"
    style="
      background: linear-gradient(
          rgb(46, 57, 88),
          rgb(44, 51, 71) 72%,
          rgb(46, 57, 88) 80%,
          rgb(46, 57, 88)
        ),
        rgb(46, 57, 88);
    "
  >
    <div class="container" style="z-index: 5">
      <div
        class="card shadow-lg o-hidden border-0 my-5"
        style="box-shadow: 0px 0px; border-radius: 12px"
      >
        <div class="col-12 col-lg-12 offset-0">
          <div class="p-5">
            <div class="text-center">
              <h4 class="text-dark mb-4">Insertoni filmin</h4>
            </div>
            <!-- Start: check -->
            <div class="row mb-3">
              <div class="col-sm-6 col-lg-12">
                <label
                  class="form-label"
                  style="color: rgb(44, 45, 50); padding-right: 14px"
                  >A gjendet ky film ne IMDb?</label
                ><select
                  id="infoOption"
                  required=""
                  style="/*margin-left: 7px;*/"
                  title="sss"
                  onchange="showForm()"
                >
                  <option value="1" selected="">Po kam IMDb ID</option>
                  <option value="0" selected="">Jo dua manualisht</option>
                  <option value="-1" selected="" disabled="" hidden="">
                    Zgjedh opsionin
                  </option>
                </select>
              </div>
            </div>
            <!-- End: check --><!-- Start: manual -->
            <div id="getinfo" class="d-info">
              <hr style="margin-bottom: 31px" />
              <div id="getimdb" class="row mb-3">
                <div
                  class="col-sm-6 col-xxl-2 offset-xxl-0 mb-3 mb-sm-0"
                  style="height: auto"
                >
                  <input
                    type="text"
                    id="movieID"
                    name="IMDb ID"
                    placeholder="IMDb ID ex. tt123456"
                    style="height: 100%; vertical-align: middle"
                  />
                </div>
                <div class="col">
                  <!-- Start: Rounded Button Success --><button
                    class="btn btn-primary btn-circle ms-1"
                    id="status"
                    type="button"
                    style="margin-left: 9px; width: 40px; height: 40px"
                    onclick="getMovieDetails()"
                  >
                    <i
                      class="fas fa-search text-white"
                      id="statusIcon"
                      style="transform: scale(0.8)"
                    ></i></button
                  ><!-- End: Rounded Button Success -->
                </div>
              </div>
              <label
                class="form-label"
                style="color: rgb(42, 42, 44); text-align: center"
                >Detajet kryesore te filmit</label
              >
              <form
                enctype="multipart/form-data"
                id="movieform"
                class="user"
                action="./add.php"
                method="POST"
              >
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <input
                      class="form-control form-control-user"
                      type="text"
                      id="title"
                      placeholder="Emri i filmit"
                      name="emri"
                      style="margin-bottom: 10px"
                      required=""
                    />
                  </div>
                  <div class="col-sm-6">
                    <input
                      class="form-control form-control-user"
                      type="text"
                      id="runtime"
                      placeholder="Gjatesia e filmit ne minuta"
                      name="runtime"
                      style="margin-bottom: 10px"
                      required=""
                    />
                  </div>
                  <div class="col-sm-6">
                    <input
                      class="form-control form-control-user"
                      type="text"
                      id="released"
                      placeholder="Viti i lansimit"
                      name="release_date"
                      style="margin-bottom: 10px; margin-top: 0px"
                      required=""
                      pattern="^[0-9]*$"
                    />
                  </div>
                  <div class="col-sm-6">
                    <input
                      class="form-control form-control-user"
                      type="text"
                      id="genre"
                      placeholder="Zhanri i filmit"
                      name="movie_genre"
                      style="margin-bottom: 10px"
                      required=""
                    />
                  </div>
                  <div class="col">
                    <div>
                      <label
                        class="form-label"
                        style="color: rgb(47, 47, 51); text-align: center"
                        >Insertoni posterin e filmit:</label
                      ><input
                        class="form-control"
                        type="file"
                        id="file"
                        required=""
                        accept="image/*"
                        name="moviePoster"
                        style="margin-bottom: 8px"
                        onchange="onFileSelected(event)"
                      />
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        id="formCheck-1"
                        name="slideshow"
                        value="Po"
                      /><label
                        class="form-check-label"
                        data-bs-toggle="tooltip"
                        data-bss-tooltip=""
                        for="formCheck-1"
                        title="Nese selektoni kete filmi do paraqitet ne slideshow"
                        >Slideshow</label
                      >
                    </div>
                  </div>
                  <div class="col">
                    <img
                      data-bs-toggle="tooltip"
                      data-bss-tooltip=""
                      id="poster"
                      style="
                        height: 138px;
                        width: 246px;
                        text-align: center;
                        border-radius: 17px;
                        object-fit: cover;
                      "
                      src="https://imgix.gizmodo.com.au/content/uploads/sites/2/2021/05/10/237bm4bba4g61.png?ar=16%3A9&amp;auto=format&amp;fit=crop&amp;q=80&amp;w=1280&amp;nrs=30"
                      title="Kjo foto eshte vetem cropped preview nuk paraqet versionin final"
                    />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="form-label" style="color: rgb(47, 47, 51)"
                    >Detajet tjera rreth filmit</label
                  >
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input
                      class="form-control form-control-user"
                      type="text"
                      id="studio"
                      placeholder="Studio"
                      name="movie_studio"
                      required=""
                    /><input
                      class="form-control form-control-user"
                      type="text"
                      id="boxoffice"
                      placeholder="Fitimet"
                      name="box_office"
                      style="margin-top: 8px"
                      required=""
                    />
                  </div>
                  <div class="col-sm-6">
                    <input
                      class="form-control form-control-user"
                      type="text"
                      id="director"
                      placeholder="Regjistori i filmit"
                      name="movie_director"
                      required=""
                    /><input
                      class="form-control form-control-user"
                      type="text"
                      id="actors"
                      placeholder="Aktoret kryesor"
                      name="movie_actors"
                      style="margin-top: 8px"
                      required=""
                    />
                  </div>
                </div>
                <textarea
                  class="form-control"
                  id="plot"
                  placeholder="Ploti i filmit"
                  rows="5"
                  cols="1"
                  name="plot"
                  style="margin-bottom: 1%; border-radius: 14px"
                  required=""
                ></textarea>
                <div class="row mb-3">
                  <div
                    class="col-sm-6 col-xxl-1 offset-xxl-3"
                    style="margin-bottom: 1%; width: 100px"
                  >
                    <!-- Start: Rounded Button Danger --><a
                      class="btn btn-danger btn-circle ms-1"
                      role="button"
                      style="text-align: center; width: 45px; height: 45px"
                      onclick="resetForm()"
                      ><i
                        class="fas fa-trash text-white"
                        style="text-align: center"
                      ></i></a
                    ><!-- End: Rounded Button Danger -->
                  </div>
                  <div class="col-sm-6">
                    <button
                      class="btn btn-primary d-block btn-user w-100"
                      id="insertMovie"
                      type="submit"
                      style="width: 100%"
                    >
                      <input
                        class="form-control"
                        type="hidden"
                        id="imdbIDfield"
                        value="NULL"
                        name="imdbMovieID"
                      />
                      <input
                        class="form-control"
                        type="hidden"
                        id="imdbIDrating"
                        value="NULL"
                        name="imdbMovieRating"
                      />
                      <input
                        class="form-control"
                        type="hidden"
                        id="posterfield"
                        value="NULL"
                        name="photo"
                      />Inserto kete film
                    </button>
                  </div>
                </div>
                <div class="mb-3"></div>
              </form>
            </div>
            <!-- End: manual -->
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="assets/js/script.min2.js"></script>
  </body>
</html>

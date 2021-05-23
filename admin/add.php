<?php
  namespace Verot\Upload;

use Perkthe;

require_once('../php/session.php');
  require_once('../php/connect.php');
  require_once('../php/class.upload.php');
  require_once('../php/translate.php');

  $emri = $_POST["emri"];
  $runtime = $_POST["runtime"];
  $release_date = $_POST["release_date"];
  $genre = $_POST["movie_genre"];
  $studio = $_POST["movie_studio"];
  $boxoffice = $_POST["box_office"];
  $director = $_POST["movie_director"];
  $actors = $_POST["movie_actors"];
  $plot = $_POST["plot"];
  $perkthe = new Perkthe("en-sq");
  $plotTranslated = $perkthe->translate($plot)['text'][0];
  $imdbid = $_POST["imdbMovieID"];
  $imdbrating = $_POST["imdbMovieRating"];
  $poster = $_POST["photo"];
  $isSlideshowInput = $_POST["slideshow"];
  $isSlideshow = ($isSlideshowInput == "Po");
  $imdbrating = doubleval($imdbrating);  
  if(isset($_FILES['moviePoster']) && $_FILES['moviePoster']['error'] === UPLOAD_ERR_OK){
    $handle = new Upload($_FILES['moviePoster']);
      if ($handle->uploaded) {
        if(!($handle->file_is_image)){
          $forceRedirect = true;
        }else{
          $newFileName = md5(time() . $handle->file_src_name_body);
          $handle->file_new_name_body    = $newFileName;  
          $handle->image_resize          = true;
          $handle->image_ratio_crop      = true;
          $handle->image_y               = 444;
          $handle->image_x               = 300;
          header('Content-type: ' . $handle->file_src_mime);
          $handle->process('../assets/img/movies');
          if ($handle->processed) {
            $poster = $handle->file_dst_pathname;
            $handle->clean();
          } else {
            $poster = $handle->error;
          }
        }
      }
    }


  $sqlQ = "INSERT INTO Movies(Slideshow, Poster, Viti, Emri, Gjatesia, Zhanri, Regjisor, Aktoret, Plot, ImdbId, ImdbRating, Studio, BoxOffice) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $sqlI = $con->prepare($sqlQ);
  $status = $sqlI->execute([(int)$isSlideshow, $poster, $release_date, $emri, $runtime, $genre, $director, $actors, $plotTranslated, $imdbid, $imdbrating, $studio, $boxoffice]);
  if($status){
    echo "Filmi u insertua me sukses";
    header("location: ./addMovie.php");
  }
?>
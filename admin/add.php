<?php

  
  require_once('connect.php');
  $emri = $_POST["emri"];
  $runtime = $_POST["runtime"];
  $release_date = $_POST["release_date"];
  $genre = $_POST["movie_genre"];
  $studio = $_POST["movie_studio"];
  $boxoffice = $_POST["box_office"];
  $director = $_POST["movie_director"];
  $actors = $_POST["movie_actors"];
  $plot = $_POST["plot"];
  $imdbid = $_POST["imdbMovieID"];
  $imdbrating = $_POST["imdbMovieRating"];
  $poster = $_POST["photo"];
  $isSlideshowInput = $_POST["slideshow"];
  $isSlideshow = ($isSlideshowInput == "Po");

  $imdbrating = doubleval($imdbrating);  
  
  $sqlQ = "INSERT INTO Movies(Slideshow, Poster, Viti, Emri, Gjatesia, Zhanri, Regjisor, Aktoret, Plot, ImdbId, ImdbRating, Studio, BoxOffice) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $sqlI = $con->prepare($sqlQ);
  $status = $sqlI->execute([(int)$isSlideshow, $poster, $release_date, $emri, $runtime, $genre, $director, $actors, $plot, $imdbid, $imdbrating, $studio, $boxoffice]);
  if($status){
    header('location: ../admin/add.html');
  }
?>
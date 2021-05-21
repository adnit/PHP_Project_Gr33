<?php
  require_once("./php/session.php");
  require_once('./php/connect.php');

  if(!(isset($_SERVER['QUERY_STRING']))){
    header("location: ./intro.php");
  }else{
    $movie = $_SERVER['QUERY_STRING'];
    $movie = explode('-',$movie);
    $movieName = "";
    if(sizeof($movie) < 1){
      header("location: ./login.php");
    }
    for ($i=0; $i < count($movie) - 1; $i++) { 
      $movieName.= $movie[$i].' ';
    }
    $movieYear = end($movie);
    $movieName = trim($movieName);
    $sql = 'SELECT `MovieId`, `Poster`, `Viti`, `Emri`, `Gjatesia`, `Zhanri`, `Regjisor`, `Aktoret`, `Plot`, `ImdbId`, `ImdbRating`, `Studio`, `BoxOffice` from Movies where Emri=? and Viti=?';
    $getmovie = $con->prepare($sql);
    $getmovie->execute([$movieName, $movieYear]);
    $result = $getmovie->fetch(PDO::FETCH_ASSOC);
    if(!$result){
      header("location: /login.php");
    }else{
      $sqlalgo = "SELECT `Poster`, `Emri`, `Viti` FROM `movies` WHERE `Zhanri` LIKE CONCAT('%', :zhanri, '%')";
      $recmovies = $con->prepare($sqlalgo);
      $movie = str_replace(' ', '',$result['Zhanri']);
      $movie = explode(',',$movie);
      $randCat = $movie[array_rand($movie)];
      // $randCat = 'Action';
      $recmovies->bindParam(':zhanri', $randCat);
      $recmovies->execute();
      $recResults = $recmovies->fetchAll(PDO::FETCH_ASSOC);
      if(count($recResults)==1){
        $rand_keys = array('0' => $recResults[0]);
      }else{
        $numResults = count($recResults) > 4 ? 4 : count($recResults);
        $rand_keys = array_rand($recResults, $numResults);
      }


    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title><?php echo ''.$result['Emri'].'('.$result['Viti'].') - KinoFiek'.''?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <style>
      #results {
  z-index: 99;

  backdrop-filter: blur(150px);

  width: 15.5rem;
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
  .input-group{
        width: 15.5rem;
      }
      .input-group li a:hover {
  cursor: pointer;
}

#results img {
  float: left;
  height: 50px;
  width: 100px;
  object-fit: cover;
  border-radius: 3px;
  margin-left: -2rem;
  }

.mvtitle {
  float: right;
  vertical-align: middle;
  margin: 8% 0;
  font-size: 0.7rem;
  margin-left: 1.5rem;
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
      .col-sm-6 img{
        height: 400px !important; 
        width: 100% !important;
        object-fit: cover;
      }
      .col-md-8 {
        width: auto !important;
      }
      .col-md-4 {
        width: 70% !important;
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
    />
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
  </head>
  <body id="page-top">
    <div id="wrapper">
    <?php include("./views/navbar.php") ?>
          <div class="container">
            <div class="row">
              <div class="col-md-8">
                <img
                  class="img-fluid"
                  src="<?php echo $result['Poster'] ?>"
                  alt="Alt Text"
                />
              </div>
              <div class="col-md-4">
                <h3 class="my-3"><?php echo $result['Emri'] ?></h3>
                <p>
                  <strong>Ngjarja e filmit</strong><br /><?php echo $result['Plot'] ?>
                </p>
                <h3 class="my-3" style="font-size: 18.9px">Detaje tjera</h3>
                <ul class="list-unstyled">
                  <li class="text-break">
                    <strong>Studio:</strong> <br /> <?php echo $result['Studio'] ?>
                  </li>
                  <li class="text-break"><strong>Aktoret: </strong><br /><?php echo $result['Aktoret'] ?></li>
                  <li class="text-break"><strong>Regjisori: </strong><br /><?php echo $result['Regjisor'] ?></li>
                  <li class="text-break"><strong>Fitime ne Box Office: </strong><br /><?php echo $result['BoxOffice'] ?></li>
                </ul>
              </div>
            </div>
            <h3 class="my-4">Filma te ngjashem<br /></h3>
            <div class="row">
            <?php
              for ($i=0; $i < count($rand_keys); $i++) { 
                $link = str_replace(' ','-',$recResults[$rand_keys[$i]]['Emri'].' '.$recResults[$rand_keys[$i]]['Viti']);
                echo 
                '
                  <div class="col-sm-6 col-md-3 mb-4">
                    <a href="./movie.php?'.$link.'">
                    <img class="img-fluid" src="'.$recResults[$rand_keys[$i]]['Poster'].'"/>
                    </a>
                  </div>
                ';}

            ?>
            </div>

              
              
            <div class="row">
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h3
                      style="
                        font-size: 22.4px;
                        margin-bottom: 0px;
                        height: 25px;
                      "
                    >
                      Komente
                    </h3>
                  </div>
                  <div class="card-body" style="height: auto">
                    <ul class="list-group" id="addcomments">
                     <?php
                      if(!(isset($_SERVER['QUERY_STRING']))){
                      header("location: ./intro.php");
                      }else{
                      $movie = $_SERVER['QUERY_STRING'];
                      $movie = explode('-',$movie);
                      $movieName = "";
                      if(sizeof($movie) < 1){
                      header("location: ./login.php");
                    }
                    for ($i=0; $i < count($movie) - 1; $i++) { 
                      $movieName.= $movie[$i].' ';
                    }
                    $movieYear = end($movie);
                    $movieName = trim($movieName);
                    $sql = 'SELECT c.CommentText,c.CommentTime,u.FirstLastName,u.UserAvatar from Movies m,Comment c,Users u where c.MovieId=m.MovieId and m.Emri=? and m.Viti=? and c.UserId=u.UserId';
                    $get_query = $con->prepare($sql);
                    $get_query->execute([$movieName, $movieYear]);}
                    while($movie = $get_query ->fetch(PDO::FETCH_ASSOC)){
                      echo 
                      '<li class="list-group-item" style="margin-bottom: 6px">
                        <div class="d-flex media">
                          <div></div>
                          <div class="media-body">
                            <div class="d-flex media" style="overflow: visible">
                              <div>
                                <img class="border rounded-circle img-profile" style="width: 50px; height: 50px;" src="'.$movie["UserAvatar"].'">
                              </div>
                              <div style="overflow: visible" class="media-body">
                                <div class="row">
                                  <div class="col-md-12" style="    margin-left: 12px;
    margin-top: 0px; ">
                                    <p class="text-break">
                                      <strong><h6>'.$movie["FirstLastName"].'</h6></strong>'.$movie["CommentText"].'<br>
                                      <small class="text-muted">'.date("F d, Y h:i:s A", $timestamp = strtotime($movie["CommentTime"])).'
                                      </small>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
    ';

                    }
                    ?> 
                    </ul>
                    <br>
                    <div class="row">
                    <div class="col col-contact">
                        <div
                          class="
                            modern-form__form-group--padding-r
                            form-group
                            mb-3
                          "
                        >
                          <input
                          id="commenttext"
                            class="form-control input input-tr"
                            type="text"
                            name="CommentText"
                            placeholder="Your Comment..."
                            required
                          />
                          <div class="line-box"><div class="line"></div></div>
                        </div>
                      </div>
                    </div>
                    <button
                    id="commentbutton"
                      class="btn btn-light"
                      style="margin-left: 629px; margin-top: 0px"
                      type="button"
                    >
                      Add Comment
                    </button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script>
      document.getElementById('sidebarToggle').click();
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
            $('#commentbutton').click(function(){
              if('<?php echo $_SESSION["loggedIn"]; ?>' != true){
                window.location.href = "./login.php";
              }else{
                var text = $('#commenttext').val();
                var userID = `<?php echo $_SESSION["userID"]; ?>`
                var movieID = `<?php echo $result['MovieId']; ?>`
                if(text !=""){
                $.ajax({
			          	url: "./php/addComment.php",
			          	type: "POST",
			          	data: {
                    text: text,
                    userID: userID,
                    movieID: movieID 
			          	},
			          	cache: false,
			          	success: function(dataResult){
			          		$('#addcomments').append(dataResult);
			          	}

			          });
              }
              }
              
            })
    </script>

  </body>
</html>

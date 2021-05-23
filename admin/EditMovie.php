<?php
  require_once("../php/session.php");
if(isset($_SESSION["user_type"]) && $_SESSION["user_type"]=="ADMIN"){

}else{
  header("location: ../index.php");
}
  require_once('../php/connect.php');

  

  if(!(isset($_SERVER['QUERY_STRING']))){
    header("location: ./intro.php");
  }else{
    $movie = $_SERVER['QUERY_STRING'];
    if(strlen($movie) < 1){
      header("location: ./login.php");
    }
    $sql = 'SELECT `MovieID`, `Poster`, `Viti`, `Emri`, `Gjatesia`, `Zhanri`, `Regjisor`, `Aktoret`, `Plot`, `ImdbId`, `ImdbRating`, `Studio`, `BoxOffice` from Movies where MovieId=?';
    $getmovie = $con->prepare($sql);
    $getmovie->execute([$movie]);
    $result = $getmovie->fetch(PDO::FETCH_ASSOC);
    if(!$result){
      header("location: /index.php");
    }else{
      $_SESSION['MovieID'] = $result['MovieID'];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>
  <body id="page-top">
    <div id="wrapper">
      <?php include("../views/navbar_admin.php")?>

      
          <div class="container">
            <div class="row">
              <div class="col-md-8">


               <div class="card-body text-center shadow">
                    <img
                    id="posterImg"
                  class="img-fluid"
                  style="width: 300px; height: 444px; object-fit: cover;"
                  src="<?php echo $result['Poster'] ?>"
                  alt="Alt Text"
                />
                    <form enctype="multipart/form-data" style="width: 300px; justify-content: center;">
  <input
                        class="form-control"
                        type="file"
                        id="posteri"
                        name="posteri"
                        style="width: 50%; margin: auto; margin-bottom: 9px"
                        accept="image/*"
                        onchange="onFileSelected(event)"
                      />
                      
                    </form>
                    <div class="mb-3">
                      <button id="changePoster" disabled style="margin: auto; margin-bottom: 9px" class="btn btn-primary btn-sm" type="button">
                        Ndrysho posterin
                      </button>
                    </div>
                  </div>
                

                    
              </div>
              <div class="col-md-4">
<div class="card shadow mb-3">
                      <div class="card-header py-3">
                        <div class="row">
                          <div class="col">
                            <p class="text-primary m-0 fw-bold">
                              Detajet e Filmit
                            </p>
                          </div>
                          <div
                            class="
                              col
                              text-end
                              d-xl-flex
                              justify-content-xl-end
                            "
                            style="text-align: right"
                          > <a id="editInfo" onclick="" style="text-decoration: inherit; color: inherit;" href='#'>
                            <i 
                            id="sideIcon"
                              class="
                                far
                                fa-edit
                                d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex
                                justify-content-end
                                align-items-start
                                justify-content-sm-end
                                justify-content-md-end
                                justify-content-lg-end
                                justify-content-xl-end
                              "
                              data-bs-toggle="tooltip"
                              data-bss-tooltip=""
                              data-bs-placement="left"
                              style="
                                font-size: 20px;
                                text-align: right;
                                width: auto;
                              "
                              title=""
                            ></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="card-body">
                        <form id="details"
                        >
                  <label class="form-label">Emri filmit</label
                  ><input
                    class="form-control"
                    type="text"
                    disabled
                    id="emri"
                    name="emri"
                    value="<?php echo $result['Emri'] ?>"
                    style="margin-bottom: 7px"
                  /><label for="ploti" class="form-label">Ngjarja e filmit</label
                  ><textarea id="ploti" disabled style="margin-bottom: 7px" name="ploti" class="form-control"><?php echo $result['Plot'] ?></textarea
                  ><label class="form-label">Studio</label
                  ><input
                    id="studio"
                    name="studio"
                    class="form-control"
                    type="text"
                    disabled
                    value="<?php echo $result['Studio'] ?>"
                    style="margin-bottom: 7px"
                  /><label class="form-label">Aktoret</label
                  ><input
                    class="form-control"
                    type="text"
                    id="aktoret"
                    disabled
                    name="aktoret"
                    style="margin-bottom: 7px"
                    value="<?php echo $result['Aktoret'] ?>"

                  /><label class="form-label">Regjisori</label
                  ><input
                    class="form-control"
                    type="text"
                    disabled
                    id="regjisor"
                    name="regjisor"
                    value="<?php echo $result['Regjisor'] ?>"
                    style="margin-bottom: 7px"
                  /><label class="form-label">Fitime ne box office</label
                  ><input
                    id="boxoffice"
                    name="boxoffice"
                    class="form-control"
                    value="<?php echo $result['BoxOffice'] ?>"
                    type="text"
                    disabled
                    style="margin-bottom: 7px"
                  />
                  
                </form>
                <div class="mb-3">
                            <button
                              id="saveBtn"
                              class="btn btn-primary btn-sm d-none"
                              
                            >
                              Save Settings
                            </button><a id="success" style="display:none;"
                              class="btn btn-success btn-circle ms-1"
                              role="button"
                              ><i class="fas fa-check text-white"></i
                            ></a>
                          </div>
                      </div>
                    </div>
              
            </div>
            <div class="row">
              <div class="col">

              </div>
            </div>
          </div>
        </div>
        <footer class="bg-white sticky-footer">
          <div class="container my-auto">

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
    let editBtn = document.getElementById('editInfo')
    let sideIcon = document.getElementById('sideIcon')
    let saveBtn = document.getElementById('saveBtn')
    let movieName = document.getElementById('emri')
    let plot = document.getElementById('ploti')
    let studio = document.getElementById('studio')
    let aktoret = document.getElementById('aktoret')
    let regjisor= document.getElementById('regjisor')
    let boxoffice = document.getElementById('boxoffice')
    var fields = [movieName, plot, studio, aktoret, regjisor, boxoffice]
    console.log(fields);
    editBtn.addEventListener('click', () => {
      if (fields[0].disabled) {
        fields.forEach(element => {
        element.disabled = false;
      });
      }else {
        fields.forEach(element => {
        element.disabled = true;
      });
      }
      saveBtn.classList.toggle("d-none");
      sideIcon.classList.toggle("fas")
      sideIcon.classList.toggle("fa-window-close")
    })


    $('#changePoster').on('click', function() {
    var file_data = $('#posteri').prop('files')[0];   
    var form_data = new FormData();
    let movieID = parseInt("<?php echo $_SESSION['MovieID']; ?>",10);
    form_data.append('file', file_data);
    form_data.append('MovieId', movieID);                            
    $.ajax({
        url: '../php/changePoster.php', // <-- point to server-side PHP script 
        dataType: 'text',  // <-- what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            // alert(php_script_response); // <-- display response from the PHP script, if any
        }
     });
});

function onFileSelected(event) {
  document.getElementById("changePoster").disabled = false;
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("posterImg");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
}
$('#saveBtn').on('click', function() {
		var movieName = $('#emri').val();
		var plot = $('#ploti').val();
		var studio = $('#studio').val();
		var aktoret = $('#aktoret').val();
		var regjisor = $('#regjisor').val();
		var boxoffice = $('#boxoffice').val();
    console.log("<?php echo $_SESSION['MovieID']; ?>")
    let movieID = parseInt("<?php echo $_SESSION['MovieID']; ?>",10);
		if(movieName!="" && plot!=""){
			$.ajax({
				url: "../php/editmovie.php",
				type: "POST",
				data: {
          movieName: movieName,
					plot: plot,
					studio: studio,
					aktoret: aktoret,
					regjisor: regjisor,
					boxoffice: boxoffice,
					movieID: movieID
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
          console.log(dataResult);
					if(dataResult.statusCode==200){
            fields.forEach(element => {
              element.disabled = true;
            });
            $("#success").show();
            // location.reload();
					}
					else if(dataResult.statusCode==201){
					  alert("Error occured !");
					}
          else if(dataResult.statusCode==406){
					  alert("Username ose email jane ne perdorim!");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
    </script>
  </body>
</html>

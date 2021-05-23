<?php 
  require_once("./php/session.php");
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
    <title>Profile - Brand</title>
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
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body id="page-top">
    <div id="wrapper">
      <?php include("./views/navbar.php") ?>
          <div class="container-fluid">
            <h3 class="text-dark mb-4">Profile</h3>
            <div class="row mb-3">
              <div class="col-lg-4">
                <div class="card-body text-center shadow">
                    <img
                      id ="avatarImg"
                      class="rounded-circle mb-3 mt-4"
                      src="<?php echo $_SESSION["avatar"];?>"
                      width="160"
                      height="160"
                      style="object-fit: cover;"
                    />
                    <form>
                      <input
                        id="avatarPic"
                        name="avatarPic"
                        class="form-control"
                        type="file"
                        onchange="onFileSelected(event)"
                        style="width: 50%; margin: auto; margin-bottom: 9px"
                        accept="image/*"
                      />
                      
                    </form>
                    <div class="mb-3">
                      <button disabled id="changeAvatar" class="btn btn-primary btn-sm" type="button">
                        Change Photo
                      </button>
                    </div>
                  </div>
              </div>
              <div class="col-lg-8">
                <div class="row mb-3 d-none">
                  <div class="col">
                    <div class="card textwhite bg-primary text-white shadow">
                      <div class="card-body">
                        <div class="row mb-2">
                          <div class="col">
                            <p class="m-0">Peformance</p>
                            <p class="m-0"><strong>65.2%</strong></p>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-rocket fa-2x"></i>
                          </div>
                        </div>
                        <p class="text-white-50 small m-0">
                          <i class="fas fa-arrow-up"></i>&nbsp;5% since last
                          month
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card textwhite bg-success text-white shadow">
                      <div class="card-body">
                        <div class="row mb-2">
                          <div class="col">
                            <p class="m-0">Peformance</p>
                            <p class="m-0"><strong>65.2%</strong></p>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-rocket fa-2x"></i>
                          </div>
                        </div>
                        <p class="text-white-50 small m-0">
                          <i class="fas fa-arrow-up"></i>&nbsp;5% since last
                          month
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="card shadow mb-3">
                      <div class="card-header py-3">
                        <div class="row">
                          <div class="col">
                            <p class="text-primary m-0 fw-bold">
                              User Settings
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
                          > <a id="editInfo" onclick="" style="text-decoration: inherit; color: inherit;" href='#'> Ndrysho fjalekalimin
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
                        <form>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="username"
                                  ><strong>Username</strong></label
                                ><input
                                  class="form-control"
                                  type="text"
                                  id="username"
                                  placeholder="Username"
                                  value="<?php echo $_SESSION['username'] ?>"
                                  name="username"
                                  disabled
                                />
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="email"
                                  ><strong>Emri Mbiemri</strong></label
                                ><input
                                  class="form-control"
                                  type="text"
                                  id="first_name"
                                  value="<?php echo $_SESSION['firstlast'] ?>"
                                  placeholder="Albin Kurti"
                                  name="first_name"
                                  disabled
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="first_name"
                                  ><strong>Email addresa</strong></label
                                ><input
                                  class="form-control"
                                  type="email"
                                  id="email-1"
                                  placeholder="E-mail"
                                  value="<?php echo $_SESSION['email'] ?>"
                                  name="email"
                                  disabled
                                />
                              </div>
                            </div>
                          </div>
                           <div id="changePw" class="row d-none">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="Fjalekalimi i ri"
                                  ><strong>Fjalekalimi i vjeter</strong></label
                                ><input
                                  class="form-control"
                                  type="password"
                                  id="oldpassword"
                                  placeholder="Fjalekalimi"
                                
                                  name="oldpassword"
                                  disabled
                                />
                              </div>
                            </div>
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for=""
                                  ><strong>Fjalekalimi i ri</strong></label
                                ><input
                                  class="form-control"
                                  type="password"
                                  id="newpassword"
                                  placeholder="Fjalekalimi i ri"
                                  
                                  name="newpassword"
                                  disabled
                                />
                              </div>
                            </div>
                          </div>
                          
                        </form>
                        <div class="mb-3">
                            <button
                              id="saveBtn"
                              class="btn btn-primary btn-sm d-none"
                              type="submit"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>

    <script> 
    $('form').submit(false);
    let editBtn = document.getElementById('editInfo')
    let sideIcon = document.getElementById('sideIcon')
    let saveBtn = document.getElementById('saveBtn')
    // let usernameFld = document.getElementById('username')
    // let firstNameFld = document.getElementById('first_name')
    // let emailFld = document.getElementById('email-1')
    let oldpw = document.getElementById('oldpassword')
    let newpw = document.getElementById('newpassword')
    let changepw = document.getElementById('changePw')
    let fields = [oldpw, newpw]
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
      changepw.classList.toggle("d-none");
      sideIcon.classList.toggle("fas")
      sideIcon.classList.toggle("fa-window-close")
    })
    $('#saveBtn').on('click', function() {
    let oldPassword = oldpw.value;
    let newPassword = newpw.value;
    let userID = parseInt("<?php echo $_SESSION['userID']; ?>",10);                          
      $.ajax({
				url: "./php/changeInfo.php",
				type: "POST",
				data: {
          newPassword: newPassword,
					oldPassword: oldPassword,
					userId: userID,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
            fields.forEach(element => {
              element.disabled = true;
            });
            $("#success").show();
            window.location.replace("./login.php")
					}
					else if(dataResult.statusCode==403){
					  alert("Fjalekalimi i gabuar!");
					}
					
				}
			});
    
    
});

    $('#changeAvatar').on('click', function() {
    var file_data = $('#avatarPic').prop('files')[0];   
    var form_data = new FormData();
    let userID = parseInt("<?php echo $_SESSION['userID']; ?>",10);
    form_data.append('file', file_data);
    form_data.append('UserId', userID);                            
    $.ajax({
        url: '../php/changeAvatar.php', // <-- point to server-side PHP script 
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
  document.getElementById("changeAvatar").disabled = false;
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("avatarImg");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
}
    </script>

  
  </body>
</html>

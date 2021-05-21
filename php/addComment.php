<?php
  require_once 'session.php';
  require_once "connect.php";
  $text = $_POST["text"];
  $userId = $_POST["userID"];
  $movieId = $_POST["movieID"];

  $sql = "INSERT INTO `comment` (`CommentText`,  `UserId`, `MovieId`) VALUES (?,?,?);";
	$insertSql = $con->prepare($sql);

  if ($insertSql->execute([$text, $userId, $movieId])){
    echo 
    '
      <li class="list-group-item" style="margin-bottom: 6px">
                        <div class="d-flex media">
                          <div></div>
                          <div class="media-body">
                            <div class="d-flex media" style="overflow: visible">
                              <div>
                                <img class="border rounded-circle img-profile" style="width: 50px; height: 50px;"  src="'.$_SESSION['avatar'].'.">
                              </div>
                              <div style="overflow: visible" class="media-body">
                                <div class="row">
                                  <div class="col-md-12" style="    margin-left: 12px;
    margin-top: 0px; ">
                                    <p class="text-break">
                                      <strong><h6>'.$_SESSION['firstlast'].'</h4></strong>'.$text.' <br>
                                      <small class="text-muted">'.date("F d, Y h:i:s A").'
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
  }else{
  }
?>
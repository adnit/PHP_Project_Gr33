<?php
function redirect($type){
  if ($type == "User") {
    header('location: ../index.php');
  } else if ($type == "ADMIN") {
    header('location: ../admin.php');
  }
}
if (isset($_SESSION["loggedIn"])) {
  redirect($_SESSION["user_type"]);
}

?>
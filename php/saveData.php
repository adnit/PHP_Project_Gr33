<?php

  require_once 'connect.php';
  require_once 'session.php';
	$username=$_POST['username'];
	$firstlast=$_POST['firstlast'];
	$email=$_POST['email'];
	$userID=$_POST['userID'];
  $sql = "UPDATE users SET Username=?, FirstLastName=?, Email=? WHERE userID=?";
  $update = $con->prepare($sql);

	if ($update->execute([$username, $firstlast, $email, $userID])){
	  $_SESSION['username'] = $username;
	  $_SESSION['firstlast'] = $firstlast;
	  $_SESSION['email'] = $email;
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
?>
<?php

  require_once 'connect.php';
  require_once 'session.php';
	$movieName=$_POST['movieName'];
	$plot=$_POST['plot'];
	$studio=$_POST['studio'];
	$aktoret=$_POST['aktoret'];
	$regjisor=$_POST['regjisor'];
	$boxoffice=$_POST['boxoffice'];
	$movieID=$_POST['movieID'];
	$userID=$_POST['userID'];
  $sql = "UPDATE Movies SET Emri=?, Regjisor=?, Aktoret=?, Plot=?, Studio=?, BoxOffice=? WHERE MovieID=?";
  $update = $con->prepare($sql);
  
	if ($update->execute([$movieName, $regjisor, $aktoret, $plot, $studio, $boxoffice, $movieID])){
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
?>
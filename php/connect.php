<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "kinofiek";
	$port = "3306";

	try {
	    $con = new  PDO("mysql:host=$host;port=$port;dbname=$db",$user,$pass);
	} catch (PDOException $e) {
		echo "not connected" . $e->getMessage();
	}

?>
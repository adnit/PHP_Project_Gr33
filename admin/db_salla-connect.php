<?php

session_start();
	error_reporting(E_ERROR | E_PARSE);
	$host = "localhost";
	$user = "root";
	$pass = "db123";
	$db = "kinofiek";
	$port = "3306";

	try {
	    $conn = new  PDO("mysql:host=$host;port=$port;dbname=$db",$user,$pass);
	} catch (PDOException $e) {
		echo "not connected" . $e->getMessage();
	}

?>
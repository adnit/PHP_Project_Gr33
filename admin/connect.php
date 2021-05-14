<?php
  session_start();
	error_reporting(E_ERROR | E_PARSE);
	$host = "localhost";
	$user = "root";
	$pass = "toor";
	$db = "DATABASE NAME";

	try {
	    $con = new  PDO("mysql:host=$host;dbname=$db",$user,$pass);
	} catch (PDOException $e) {
		echo "not connected" . $e->getMessage();
	}
?>
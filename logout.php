<?php 
include_once('./php/connect.php');
include_once('./php/session.php');
session_unset(); 
session_destroy();
header('Location: ./index.php');
?>
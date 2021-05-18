<?php 
include_once('./php/connect.php');
session_unset(); 
session_destroy();
header('Location: /login.php');
?>
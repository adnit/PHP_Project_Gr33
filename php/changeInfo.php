<?php
  require_once 'session.php';
  require_once "connect.php";
  $oldpw = $_POST["oldPassword"];
  $userId = $_POST["userId"];
  $newpw = $_POST["newPassword"];

  $sql = "SELECT * FROM users WHERE UserId=?";
	$insertSql = $con->prepare($sql);
  $insertSql->execute([$userId]);
  $data = $insertSql->fetch();
  $hashed = strval($data['PASSWORD']);
  $newPassword = password_hash($newpw, PASSWORD_DEFAULT);
  if (password_verify($oldpw, $hashed)){
    $sql = "UPDATE users SET PASSWORD=? WHERE UserId=?";
    $con->prepare($sql)->execute([$newPassword, $userId]);
    session_unset(); 
    session_destroy();
    echo json_encode(array("statusCode"=>200));
  }else{
    echo json_encode(array("statusCode"=>403));
  }
?>
<?php session_start();

include("includes/db-config.php");

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("
  SELECT * FROM `user`
  WHERE `email` = '$email'
  AND `password` = '$password'
  ");

$stmt->execute();

$row = $stmt->fetch();


if ($row) {
  $_SESSION['userID'] = $row['userID'];
  echo('{"success": "true"}');
} else {
  echo('{"success": "false"}');
}
?>

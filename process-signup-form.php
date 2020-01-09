<?php 

include("includes/db-config.php");

$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email']; 
$password= $_POST['password'];

$stmt1 = $pdo->prepare("
    INSERT INTO `user`
    (`userID`, `firstName`, `lastName`, `email`, `password`)
    VALUES
    (NULL,'$fname','$lname','$email','$password')
  ");

$stmt1->execute();

$stmt2 = $pdo->prepare("
  SELECT * FROM `user`
  WHERE 
  `firstName` = '$fname'
  AND
  `lastName` = '$lname'
  AND
  `email` = '$email'
  AND 
  `password` = '$password'
  ");

$stmt2->execute();

$row = $stmt2->fetch();


if($row) {
  session_start();
  $_SESSION['userID'] = $row['userID'];
  echo('{"success": "true"}');
}

?>
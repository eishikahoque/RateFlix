<?php session_start();
$userID = $_SESSION["userID"];
include("includes/db-config.php");


$selected_options = $_POST['selected_options'];
$type = $_POST['type'];

$stmt = $pdo->prepare("
    UPDATE `user`
    SET `$type`= '$selected_options' WHERE `userID` = '$userID'
  ");

$stmt->execute();

echo('{"success": "true"}');

?>
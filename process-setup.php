<?php session_start();
include("includes/db-config.php");

$userId = $_SESSION['userID'];
$selected_options = $_POST['selected_options'];
$type = $_POST['type'];

$stmt = $pdo->prepare("
    UPDATE `user`
    SET `$type`= '$selected_options' WHERE `userID` = '$userId'
  ");

$stmt->execute();

echo('{"success": "true"}');

?>
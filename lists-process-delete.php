<?php session_start(); 

$listID = $_POST["listID"];

include ("includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `lists` WHERE `listID` = '$listID'");

$stmt->execute();

header("Location: lists-show-all.php");

?>
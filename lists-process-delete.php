<?php session_start();
$userID = $_SESSION["userID"];

$listID = $_POST["listID"];

include ("includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `lists` WHERE `listID` = '$listID'");

$stmt->execute();

$stmt2 = $pdo->prepare("DELETE FROM `tvshows-movies-lists` WHERE `listID` = '$listID'");

$stmt2->execute();

header("Location: lists-show-all.php");

?>
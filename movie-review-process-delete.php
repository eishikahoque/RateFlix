<?php session_start();
$userID = $_SESSION["userID"];

	$reviewID = $_POST["reviewID"];

	include("includes/db-config.php");

	$stmt = $pdo->prepare("DELETE FROM `movies-review` WHERE `reviewID` = '$reviewID'");

	$stmt->execute();

	header("Location: account-settings.php");
?>

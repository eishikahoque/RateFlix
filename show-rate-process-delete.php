<?php session_start();
$userID = $_SESSION["userID"];

	$ratingID = $_POST["ratingID"];

	include("includes/db-config.php");

	$stmt = $pdo->prepare("DELETE FROM `tvshows-rating` WHERE `ratingID` = '$ratingID'");

	$stmt->execute();

	header("Location: account-settings.php");
?>

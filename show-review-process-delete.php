<?php 

	$reviewID = $_POST["reviewID"];

	include("includes/db-config.php");

	$stmt = $pdo->prepare("DELETE FROM `tvshows-review` WHERE `reviewID` = '$reviewID'");

	$stmt->execute();

	header("Location: account-settings.php");
?>

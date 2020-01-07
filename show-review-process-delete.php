<?php 

	$reviewID = $_POST["reviewID"];

	include ("includes/db-config.php");

	$stmt = $pdo->prepare("DELETE FROM `product` WHERE `productID` = '$productID'");

	$stmt->execute();

	header("Location: postinglist.php");
?>

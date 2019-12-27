<?php session_start(); 

$productID = $_POST["productID"];

include ("includes/db-config.php");

$stmt = $pdo->prepare("DELETE FROM `product` WHERE `productID` = '$productID'");

$stmt->execute();

header("Location: postinglist.php");

?>
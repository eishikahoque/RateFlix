<?php // edit to use for RateFlix
include("includes/db-config.php");
$rating = $_POST['rating'];
$userID = $_POST['userID'];
$productID = $_POST['productID'];

$stmt = $pdo->prepare("INSERT INTO `rating`(`rating`, `userID`) VALUES ('$rating','$userID')");

$stmt->execute();

header("Location: detailproductpage.php?productID=$productID&userID=$userID");
?>
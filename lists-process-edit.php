<?php session_start(); 

$productID = $_POST['productID'];
$userID = $_SESSION['userID'];
$itemName = $_POST['itemName'];
$included = $_POST['included'];
$blurb = $_POST['blurb'];
// $imageUpload = addslashes(file_get_contents($_FILES['imageUpload']['tmp_name']));
$price = $_POST['price']; 
$rentDate = $_POST['rentDate'];
$brand = $_POST['brand'];
$type = $_POST['type'];
$location = $_POST['location'];
$transportOption = $_POST['transportOption'];


include ("includes/db-config.php");

$uploaddir = "images/";
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
	$stmt = $pdo->prepare("UPDATE `product` 
	SET
	`itemName` = '$itemName',`price` = '$price', `rentDate` = '$rentDate', `brand` = '$brand', `type` = '$type', `included` = '$included', `blurb` = '$blurb', `imageUpload` = '$uploadfile', `transportOption` = '$transportOption'
	WHERE `productID` = '$productID' AND `userID` = '$userID'
	");
$stmt->execute();
} else{
	echo ("image upload failed");
}



header("Location: postinglist.php");

?>
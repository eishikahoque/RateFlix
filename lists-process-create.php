<?php session_start();

$itemName = $_POST['itemName'];
$price = $_POST['price'];
$rentDate = $_POST['rentDate'];
$brand = $_POST['brand'];
$type = $_POST['type'];
$included = $_POST['included'];
$blurb = $_POST['blurb'];
$location = $_POST['location'];
$transportOption = $_POST['transportOption'];
$userID = $_SESSION["userID"]; 
$availability = 1;

include("includes/db-config.php");


$uploaddir = "images/";
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

$stmt = $pdo->prepare("INSERT INTO `product`(`productID`, `userID`, `itemName`, `price`, `rentDate`, `brand`, `type`, `included`, `blurb`, `imageUpload`, `location`, `transportOption`, `availability`) 
	VALUES (NULL,'$userID','$itemName','$price','$rentDate','$brand','$type','$included','$blurb','$uploadfile','$location','$transportOption','$availability')");

$stmt->execute();

	echo('{"success": "true"}');


// header("Location:postinglist.php?userID=$userID");

} else {
	echo('{"success": "false"}');
}

?>
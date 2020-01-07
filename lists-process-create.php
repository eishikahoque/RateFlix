<?php session_start();

$itemName = $_POST['itemName'];
$userID = $_SESSION["userID"]; 


include("includes/db-config.php");


$uploaddir = "images/";
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

$stmt = $pdo->prepare("INSERT INTO `lists`( `userID`, `listID`, `listName`, `tvshowID`, `movieID`) 
	VALUES ('$userID',NULL,'$listName','$tvshowID','$movieID')");

$stmt->execute();

	echo('{"success": "true"}');


// header("Location:postinglist.php?userID=$userID");

} else {
	echo('{"success": "false"}');
}

?>
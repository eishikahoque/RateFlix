<?php 

include("includes/db-config.php");

$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email']; 
$password= $_POST['password'];

$stmt = $pdo->prepare("
	INSERT INTO `user`
	(`userID`, `firstName`, `lastName`,`email`, `password`) 
	VALUES
	(NULL, 'fname','lname','$email', '$password')
	");

$stmt->execute();

$stmt = $pdo->prepare("
	SELECT * FROM `user`
	WHERE 
	`fname` = '$fname'
	AND
	`lname` = '$lname'
	AND
	`email` = '$email'
	AND 
	`password` = '$password'
	");

$stmt->execute();

$row = $stmt->fetch();

if($row) {
	header("Location: setup-genre.php"); 

	$_SESSION['userID'] = $row['userID'];
}

?>
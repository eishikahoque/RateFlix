<?php session_start();

include("includes/db-config.php");

$email = $_POST['email']; 
$password = $_POST['password']; 

$stmt = $pdo->prepare("
	SELECT * FROM `user`
	WHERE `email` = '$email'
	AND `password` = '$password'
	");

$stmt->execute();

$row = $stmt->fetch();


if ($row) {
	$_SESSION['userID'] = $row['userID'];

	header("Location: home.php");

} else {
	include("includes/header.php");
	?> 
	<p style="text-align: center; padding-top: 32px; font-size: 1.5rem;">Sorry, we do NOT have a match in our system!</p>
	<p style="text-align: center; padding: 0px; font-size: 1.5rem;">Please <a style="text-decoration: underline; font-size: 1.5rem;" href="login-form.php">login</a> or <a style="text-decoration: underline; font-size: 1.5rem;" href="signup-form.php"> sign up</a>.</p>
	<?php 
	include("includes/footer.php");
;}
?>

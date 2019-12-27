<?php //edit to use for RateFlix
include("includes/db-config.php");

$userID = $_GET['userID'];

$stmt = $pdo->prepare("SELECT * FROM `user` WHERE `userID` = '$userID'");
$stmt->execute();

?>
<html> 
<head> </head>
<body>

	 <?php 

	$stmt2 = $pdo->prepare("SELECT * 
	FROM `user` 
	INNER JOIN `rating` 
	ON `user`.`userID` = `rating`.`userID`
	WHERE `rating`.`userID` = $userID;");
	$stmt2->execute();

	 while($row = $stmt->fetch()) { ?>
		<p><?php echo($row['userID']); ?> 
		<?php echo($row['firstName']); ?>
		</p>
	<?php } ?>

	<p> Rating: <?php

	$rateAvg = $pdo->prepare("SELECT AVG(`rating`) as avrg FROM `rating` WHERE `userID` = '$userID'");
	$rateAvg->execute();

	$rowAVG = $rateAvg->fetch();

	echo($rowAVG["avrg"]);
?>
	<form method="POST" action="process-rating.php">
		<input type="radio" value="1" name="rating">
		<br>
		<input type="radio" value="2" name="rating">
		<br>
		<input type="radio" value="3" name="rating">
		<br>
		<input type="radio" value="4" name="rating">
		<br>
		<input type="radio" value="5" name="rating">
		<br>
		<input type="hidden" name="userID" 
		value="<?php echo($userID); ?>" >
		<input type="submit">
	</form>
</body>
</html>
<?php session_start();
$userID = $_SESSION["userID"];


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/account.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>Account Settings</title>
</head>
<?php

include("includes/header.php"); 
include("includes/db-config.php"); 
?>
	<body>
		<?php if (isset($_SESSION['userID'])){ 
			$stmt = $pdo->prepare("SELECT * FROM `user` WHERE `userID` = '$userID';");

			$stmt->execute();

			$row = $stmt->fetch();
		?>
		<main class="main-container">
			<h1>Account</h1>
			<section>
				<h2>Personal Info</h2>
				<div class="personal-info">
					<p>First Name:</p><p class="info"> <?php echo($row["firstName"]); ?></p>
				</div>
				<div class="personal-info">
					<p>Last Name:</p><p class="info"> <?php echo($row["lastName"]); ?></p>
				</div>
				<div class="personal-info">
					<p>Email:</p><p class="info"> <?php echo($row["email"]); ?></p>
				</div>
				<div class="personal-info">
					<p>Password:</p><p class="info"> <input type="password" class="password" name="password" value="<?php echo($row["password"]); ?>" readonly /></p>
				</div>

				<div class="edit-button">
  		<a href="edit-user.php?userID=<?php echo($row["userID"]); ?>">Edit</a>
  	</div>
			</section>
			<section>
				<h2>Your TV Show Ratings</h2>
				<?php 
				$stmt = $pdo->prepare("SELECT * FROM `tvshows-rating` WHERE `userID` = '$userID';");

				$stmt->execute();

				while($row = $stmt->fetch()){ ?>
				<p><?php echo($row["myRating"]); }?></p>
			
			</section>
			<div class="editReview"> 
				<p class="editReviewBtn">
					<a href="show-review-edit.php?tvshowID=<?php echo($row["tvshowID"]); ?>"><i class="fas fa-edit"></i></a>
				</p>
				<p class="deleteReview">
					<a href="show-review-delete.php?tvshowID=<?php echo($row["tvshowID"]); ?>"><i class="fas fa-trash"></i></a>
				</p>
			</div>
			<section>
				<h2>Your TV Show Reviews</h2>
				<?php 
				$stmt = $pdo->prepare("SELECT * FROM `tvshows-review` WHERE `userID` = '$userID';");
				$stmt->execute();
				$tvshowID = "";
				while($row = $stmt->fetch()) {
					$tvshowID = $row["tvshowID"]; ?>
					<div class="column">
						<p><?php echo($row["review"]); ?></p>
						
						<?php
						$stmtTV = $pdo->prepare("SELECT * FROM `tvshows` INNER JOIN `tvshows-review` ON `tvshows`.`tvshowID`=`tvshows-review`.`tvshowID` WHERE `tvshows`.`tvshowID`= '$tvshowID';");
						$stmtTV->execute();
						$row2 = $stmtTV->fetch();?>
				
					<img class="tileImg" src="<?php echo($row2["images"]); ?>" />
				</div>
				
			<?php } ?>
			</section>

			<section>
				<h2>Your Movie Ratings</h2>
				<?php 
				$stmt = $pdo->prepare("SELECT * FROM `tvshows-rating` WHERE `userID` = '$userID';");

				$stmt->execute();

				while($row = $stmt->fetch()){;

			?>
			<p><?php echo($row["myRating"]); }?></p>
			</section>

			<section>
				<h2>Your Movie Reviews</h2>
				<?php 
				$stmt = $pdo->prepare("SELECT * FROM `tvshows-review` WHERE `userID` = '$userID';");

				$stmt->execute();

				while($row = $stmt->fetch()){;
			?>
			<p><?php echo($row["review"]); }?></p>
			</section>
		</main>



	<?php include("includes/footer.php"); ?> 
<?php } else{}?>
	</body>

</html>
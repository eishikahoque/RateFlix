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
	<title>Delete Rating</title>
</head>
<?php

include("includes/header.php"); 
include("includes/db-config.php"); 
?>
	<body>
		<?php if (isset($_SESSION['userID'])){ ?>

			<section class="review-delete">
				<h2>Are you sure you want to delete your TV show rating?</h2>
				<?php 
				$ratingID = $_GET["ratingID"];
				$stmt = $pdo->prepare("SELECT * FROM `tvshows-rating` WHERE `ratingID` = '$ratingID';");
				$stmt->execute();?>
				<div class="account-reviews">
					<?php $row = $stmt->fetch();
						?>
							<div>
								<!-- <p class="reviews"> -->
									<div class="rating-alignment"><p>
									<span class="fa fa-star star starSelected"></span><?php echo($row["myRating"]); ?>
								</div>
								
							
							<form action="show-rate-process-delete.php" method="POST">
									<input type="hidden" name="ratingID" value="<?php echo($row["ratingID"]); ?>" />
									<div class="delete-button-row">
										<button class="deleteBtn">Confirm Delete</button>
									</div>
								</form>
								</div>
						</div>
				</div>
			</section>

		<?php include("includes/footer.php"); ?> 
		<?php } else { header("Location: landingpage.php");} ?>

	</body>

</html>
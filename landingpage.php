<?php
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/landingpage.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>RATEFLIX</title>
	</head>
	<body>
		<?php 
			include("includes/header.php"); 
			include("includes/db-config.php"); 
		?>

		<?php 
		$stmt = $pdo->prepare("SELECT * FROM `tvshows`ORDER BY RAND() LIMIT 12");

		$stmt->execute(); ?>

		<div class="row">
		<?php while ($row = $stmt->fetch()){ ?>
			<div class="tile">
				<img class="tileImg" src="<?php echo($row["images"]);?>"/>
			</div>
		<?php } ?>
		</div>
			<p class="blurb">
				Search, review and rate your beloved Movies and TV Series in a fun and friendly way. Browse through our huge list of movie titles and TV shows to find your next favourite!
			</p>
			<div class="btn-row">
				<button class="landing-button"><a href="signup-form.php">SIGN UP NOW</button></a>
			</div>
		<?php 
		$stmt = $pdo->prepare("SELECT * FROM `movies`ORDER BY RAND() LIMIT 12");

		$stmt->execute(); ?>

		<div class="row" style="display: none;">
		<?php while ($row = $stmt->fetch()){ ?>
			<div class="tile">
				<img class="tileImg" src="<?php echo($row["images"]);?>"/>
			</div>
		<?php } ?>
		</div>
		
			<div class="cta">
			<div class="banners">
			<img src="/RateFlix/images/rate.png">
			<div class="items">
				<h1>Rate</h1>
				<p>And get movies and shows recommended to you to watch next.</p>
				<button class="landing-button-subtle"><a href="signup-form.php">SIGN UP NOW</button></a>
			</div>
			</div>
			<div class="banners">
			<img src="/RateFlix/images/review.png">
			<div class="items">
				<h1>Review</h1>
				<p>And join the community of movie lovers by writing your first review.</p>
				<button class="landing-button-subtle"><a href="signup-form.php">SIGN UP NOW</button></a>
			</div>
			</div>
		<div class="banners">
			<img src="/RateFlix/images/check.png">
			<h1>Add to your list</h1>
			<p> Add any movies and shows to your personalized lists to come back to later.</p>
			<button class="landing-button-subtle"><a href="signup-form.php">SIGN UP NOW</button></a>
		</div>
		</div>
	</body>

</html>
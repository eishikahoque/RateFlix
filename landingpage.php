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
		$stmt = $pdo->prepare("SELECT * FROM `tvshows`ORDER BY RAND() LIMIT 10");

		$stmt->execute(); ?>

		<div class="row">
		<?php while ($row = $stmt->fetch()){ ?>
			<div class="tile">
				<img class="tileImg" src="<?php echo($row["images"]);?>"/>
			</div>
		<?php } ?>
		</div>
		<?php 
		$stmt = $pdo->prepare("SELECT * FROM `movies`ORDER BY RAND() LIMIT 10");

		$stmt->execute(); ?>

		<div class="row">
		<?php while ($row = $stmt->fetch()){ ?>
			<div class="tile">
				<img class="tileImg" src="<?php echo($row["images"]);?>"/>
			</div>
		<?php } ?>
		</div>
		<div class="banners">
			<img src="/RateFlix/images/rate.png">
			<div class="items">
				<h1>Rate & Review</h1>
				<p>And get movies and shows recommended to you to watch next. </p>
				<button class="landing-button-subtle">SIGN UP NOW</button>
			</div>
			
		</div>
		<div class="banners">
			<img src="/RateFlix/images/review.png">
			<h1>Add to your list.<h1>
			<p> Add any movies and shows to your personalized lists to come back to later. </p>
			<button class="landing-button-subtle">SIGN UP NOW</button>
		</div>
		<div class="banners">
			<p> RateFlix is an fun and friendly online database designed to help you explore the world of movies and Tv shows and decide what to watch. Our searchable database includes many movies and Tv shows, including Netflix Originals. Our core feature is to create an interactive and friendly environment to search, review and rate movies and Tv shows. We will soon add on the feature to share and become friends and interact with other movie lovers and Tv show enthusiasts.  </p>
			<button class="landing-button">SIGN UP NOW</button>
		</div>
		

		







		<?php include("includes/footer.php") ?>
	</body>

</html>
<?php session_start();
$userID = $_SESSION["userID"];

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/home.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>RATEFLIX</title>
</head>
<?php

include("includes/header.php"); 
include("includes/db-config.php"); 
?>
<?php if (isset($_SESSION['userID'])){ ?>
	<body>
		<section>
			<h2>Action</h2>
			<?php 
			$stmt = $pdo->prepare("
				SELECT
				    `images`,
				    `tvshowID` as `id`,
				    'tv' AS `source`
				FROM
				    `tvshows`
				WHERE
				    `genre` = 'crime drama'
				UNION
				SELECT
				    `images`,
				    `movieID` as `id`,
				    'movie' AS `source`
				FROM
				    `movies`
				WHERE
				    `genre` = 'action adventure'
				ORDER BY RAND() LIMIT 20
				");

			$stmt->execute(); ?>

			<div class="row">
    			<?php

				while ($row = $stmt->fetch()) {

					$link = "";

				if($row['source'] === 'movie') {
					$link = "/RateFlix/movie-detail.php?movieID=".$row['id']."&userID=".$userID;
				} else if ($row['source'] === 'tv') {
					$link = "/RateFlix/show-detail.php?tvshowID=".$row['id']."&userID=".$userID;

				}
				?>

					<div class="tile">
						<a href="<?php echo($link); ?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
						<!-- <div class="tileDetails"> -->
							<?php // echo($row["name"]); ?>
						<!-- </div> -->
					</div>

				<?php } ?>
			</div>
		</section>

		<section>
			<h2>Netflix Original</h2>
			<?php 
			$stmt = $pdo->prepare("
				SELECT
				    `images`,
				    `tvshowID` as `id`,
				    'tv' AS `source`
				FROM
				    `tvshows`
				WHERE
				    `netflixOriginal` = '1'
				UNION
				SELECT
				    `images`,
				    `movieID` as `id`,
				    'movie' AS `source`
				FROM
				    `movies`
				WHERE
				    `netflixOriginal` = '1'
				   ORDER BY RAND() LIMIT 20
				");

			$stmt->execute(); ?>

			<div class="row">
    			<?php

				while ($row = $stmt->fetch()) {

					$link = "";

				if($row['source'] === 'movie') {
					$link = "/RateFlix/movie-detail.php?movieID=".$row['id']."&userID=".$userID;
				} else if ($row['source'] === 'tv') {
					$link = "/RateFlix/show-detail.php?tvshowID=".$row['id']."&userID=".$userID;
				} 
				?>

					<div class="tile">
						<a href="<?php echo($link); ?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
						<!-- <div class="tileDetails"> -->
							<?php // echo($row["name"]); ?>
						<!-- </div> -->
					</div>

				<?php } ?>
			</div>
		</section>

		<section>
			<h2>Recently Released</h2>

			<?php 
			$stmt = $pdo->prepare("
				SELECT
				    `images`,
				    `tvshowID` AS `id`,
				    'tv' AS `source`
				FROM
				    `tvshows`
				WHERE
				    `releaseYear` = '2018'
				OR
					`releaseYear` = '2019'
				UNION
				SELECT
				    `images`,
				    `movieID` AS `id`,
				    'movie' AS `source`
				FROM
				    `movies`
				WHERE
				    `releaseYear` = '2018'
				OR
					`releaseYear` = '2019'
				 ORDER BY RAND() LIMIT 20");

			$stmt->execute(); ?>

			<div class="row">
    			<?php

				while ($row = $stmt->fetch()) {

					$link = "";

				if ($row['source'] === 'tv') {
					$link = "/RateFlix/show-detail.php?tvshowID=".$row['id']."&userID=".$userID;

				} else if($row['source'] === 'movie') {
					$link = "/RateFlix/movie-detail.php?movieID=".$row['id']."&userID=".$userID;
				}
				?>

					<div class="tile">
						<a href="<?php echo($link); ?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
						<!-- <div class="tileDetails"> -->
							<?php // echo($row["name"]); ?>
						<!-- </div> -->
					</div>

				<?php } ?>
			</div>
		</section>

		<section>
			<h2>Dramas</h2>
			<?php 
			$stmt = $pdo->prepare("
				SELECT
				    `images`,
				    `tvshowID` as `id`,
				    'tv' AS `source`
				FROM
				    `tvshows`
				WHERE
				    `genre` = 'drama'
				OR
					`genre` = 'crime drama'
				UNION
				SELECT
				    `images`,
				    `movieID` as `id`,
				    'movie' AS `source`
				FROM
				    `movies`
				WHERE
				    `genre` = 'drama'
				ORDER BY RAND() LIMIT 20
				");

			$stmt->execute(); ?>

			<div class="row">
    			<?php

				while ($row = $stmt->fetch()) {

					$link = "";

				if($row['source'] === 'movie') {
					$link = "/RateFlix/movie-detail.php?movieID=".$row['id']."&userID=".$userID;
				} else if ($row['source'] === 'tv') {
					$link = "/RateFlix/show-detail.php?tvshowID=".$row['id']."&userID=".$userID;

				}
				?>

					<div class="tile">
						<a href="<?php echo($link); ?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
						<!-- <div class="tileDetails"> -->
							<?php // echo($row["name"]); ?>
						<!-- </div> -->
					</div>

				<?php } ?>
			</div>
		</section>

		<section>
			<h2>Comedies</h2>
			<?php 
			$stmt = $pdo->prepare("
				SELECT
				    `images`,
				    `tvshowID` AS `id`,
				    'tv' AS `source`
				FROM
				    `tvshows`
				WHERE
				    `genre` = 'comedy'
				UNION
				SELECT
				    `images`,
				    `movieID` AS `id`,
				    'movie' AS `source`
				FROM
				    `movies`
				WHERE
				    `genre` = 'comedy'
				OR
					`genre` = 'romantic comedy'
				 ORDER BY RAND() LIMIT 20
				");

			$stmt->execute(); ?>

			<div class="row">
    			<?php

				while ($row = $stmt->fetch()) {

					$link = "";

				if ($row['source'] === 'tv') {
					$link = "/RateFlix/show-detail.php?tvshowID=".$row['id']."&userID=".$userID;

				} else if($row['source'] === 'movie') {
					$link = "/RateFlix/movie-detail.php?movieID=".$row['id']."&userID=".$userID;
				}
				?>

					<div class="tile">
						<a href="<?php echo($link); ?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
						<!-- <div class="tileDetails"> -->
							<?php // echo($row["name"]); ?>
						<!-- </div> -->
					</div>

				<?php } ?>
			</div>
		</section>

		<?php include("includes/footer.php"); ?> 
		<?php } else { header("Location: landingpage.php");} ?>

	</body>

</html>
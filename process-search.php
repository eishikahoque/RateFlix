<?php  session_start();
$userID = $_SESSION["userID"];
include("includes/db-config.php");
$searchTerm = $_POST["searchTerm"];


$stmtSearch = $pdo->prepare("
				SELECT
				    name,
				    releaseYear,
				    genre,
				    images,
				    `tvshowID` AS `id`,
				    'tv' AS `source`
				FROM
				    `tvshows`
				WHERE
					`name` LIKE '%$searchTerm%'
					OR
					`releaseYear` LIKE '%$searchTerm%'
					OR
				    `genre` LIKE '%$searchTerm%'  
				UNION
				SELECT
				    name,
				    releaseYear,
				    genre,
				    images,
				    `movieID` AS `id`,
				    'movie' AS `source`
				FROM
				    `movies`
				WHERE
				    `name` LIKE '%$searchTerm%'
					OR
					`releaseYear` LIKE '%$searchTerm%'
					OR
				    `genre` LIKE '%$searchTerm%'  
				");
				// 	 UNION
				// -- SELECT
				// -- 	`fname`,
				// -- 	`mname`,
				// -- 	`lname`,
				// -- 	`actorID` AS `id`,
				// -- FROM
				// -- 	`actors`
				// -- WHERE 
				// -- 	`firstName` LIKE '%$searchTerm%'
				// -- 	OR
				// -- 	`middleName` LIKE '%$searchTerm%'
				// -- 	OR
				// --     `lastName` LIKE '%$searchTerm%'

$stmtSearch->execute();

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
	<title>Search <?php echo("$searchTerm");?></title>
</head>

<body>
	<?php include("includes/header.php"); ?>
<!-- // $stmtSearch = $pdo->prepare("SELECT * FROM `tvshows` WHERE `name` LIKE '%$searchTerm%' OR `genre` LIKE '%$searchTerm%'");
 // OR 
	// `type` LIKE '%$searchTerm%' AND `availability` = '1' -->		
		<section>
			<div>
				<h1>You searched for <?php echo("$searchTerm"); ?></h1>
			</div>
			<div class="show-all-row">
    			<?php

				while ($row = $stmtSearch->fetch()) {

					$link = "";

				if ($row['source'] === 'tv') {
					$link = "/RateFlix/show-detail.php?tvshowID=".$row['id']."&userID=".$userID;

				} else if($row['source'] === 'movie') {
					$link = "/RateFlix/movie-detail.php?movieID=".$row['id']."&userID=".$userID;
				}
				?>

		

					<div class="tile">
						<a href="<?php echo($link); ?>"><img class="tileImg" src="<?php echo($row["images"]); ?>"/></a>
						<!-- <div class="tileDetails"> -->
							<?php // echo($row["name"]); ?>
						<!-- </div> -->
					</div>

				<?php } ?>
			</div>
		</section>
</body>
</html>
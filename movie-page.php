<?php session_start();
$userID = $_SESSION["userID"];
if (isset($_SESSION['userID'])){ 
	
			
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
	<title>MOVIES</title>
	<?php

	include("includes/header.php"); 
	include("includes/db-config.php"); 
	?>
</head>


	<body>
		<section>
			<h2>Movies</h2>
			<?php 
			$stmt = $pdo->prepare("SELECT * FROM `movies` ");
			
			$stmt->execute();

			?>

			<div class="show-all-row">

    			<?php

				while ($row = $stmt->fetch()){ ?>

					<div class="tile">
						<a href="/RateFlix/movie-detail.php?movieID=<?php echo($row['movieID']);?>&userID=<?php echo($userID);?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
					
					</div>

				<?php } ?>
			</div>
		</section>
		
	<?php ("includes/footer.php"); ?>
	<?php } else { header("Location: landingpage.php");} ?>

	</body>

</html>

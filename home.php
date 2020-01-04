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

</head>
<?php

include("includes/header.php"); 
include("includes/db-config.php"); 

?>

<!DOCTYPE html>
<html>

	<head>

		<title>RATEFLIX</title>
		<!-- <link rel="stylesheet" type="text/css" href="includes/header.css" /> -->

	</head>

	<body>
		<section>
			<h2>Tv Show Dramas</h2>
			<?php 
			$stmt = $pdo->prepare("SELECT * FROM `tvshows` WHERE `genre` = 'drama'");
			
			$stmt->execute();

			?>

			<div class="row">
    			<div class="row__inner">

    			<?php

				while ($row = $stmt->fetch()){ ?>

					<div class="tile">
				        <div class="tile__media">
				          <img class="tile__img" src=" <?php echo($row["images"]); ?>" alt="" src="show-detail.php?showID=<?php echo($row['showID']) ?>" />
				        </div>
				        <div class="tile__details">
				          <div class="tile__title">
				            <?php echo($row["name"]); ?>
				          </div>
				        </div>
				      </div>


				<?php } ?>

    					</div>

    				</div>

		
		</section>
		<section>
			<h2>Netflix Tv Shows Original</h2>
			<?php 
			$stmt = $pdo->prepare("SELECT * FROM `tvshows` WHERE `netflixOriginal` = '1'");
	
				$stmt->execute();

				while ($row = $stmt->fetch()){
					echo($row["images"]);
				}
			?>
		</section>
		

	</body>

</html>
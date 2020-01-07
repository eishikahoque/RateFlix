<?php session_start();
$userID = $_SESSION["userID"];


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/details-page.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>Edit Review for <?php echo($row["name"]);?></title>
</head>
<?php

include("includes/header.php"); 
include("includes/db-config.php"); 
?>
	<body>
		<?php if (isset($_SESSION['userID'])){ ?>
			<main class="main-container">

				
				
			</main>
		<?php include("includes/footer.php"); ?> 
		<?php } else{}?>
	</body>

</html>
<?php session_start();
$userID = $_SESSION["userID"];

$stmtList = $pdo->prepare("SELECT * FROM `lists` WHERE `userID` = '$userID'");
$stmtList->execute();
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
	<title>Edit List</title>
	<?php

	include("includes/header.php"); 
	include("includes/db-config.php"); 
	?>
</head>

	<body>
		<?php if (isset($_SESSION['userID'])){ 
			
			?>

			<section class="review-delete">
			

				<div class="form">
					<form action="lists-process-create.php" method="POST" enctype="multipart/form-data">
						<div class="left-form">
							<input class="form-input" type="text" name="listName" id="listName" value="<?php echo($row["listName"]); ?>" required/>
						</div>
					</form>

					<div class="createBtn-row">
						<button id="createList" class="createBtn">Edit Name</button>
					</div>
				</div>
			</section>

		<?php include("includes/footer.php"); ?> 
		<?php } else { header("Location: landingpage.php");} ?>
		
	</body>

</html>
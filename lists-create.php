<?php session_start();
if (isset($_SESSION['userID'])){
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/details-page.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>Create List</title>
	
</head>
<body>
	<?php include("includes/header.php"); ?>
	<div class="form">
	<form action="lists-process-create.php" method="POST" enctype="multipart/form-data">
		<div class="left-form">
			<input class="form-input" type="text" name="listName" id="listName" required/>
		</div>
	</form>

	<div class="createBtn-row">
		<button id="createList" class="createBtn">Create List</button>
	</div>


<?php include("includes/footer.php"); ?>
</body>
</html>

<?php
} else {
	header("Location: landingpage.php");
} ?>

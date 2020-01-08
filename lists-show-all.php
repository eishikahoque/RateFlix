<?php session_start();
if (isset($_SESSION['userID'])){

$userID = $_SESSION["userID"];

include('includes/db-config.php');

include("includes/header.php");

$stmtList = $pdo->prepare("SELECT * FROM `lists` WHERE `userID` = '$userID' AND `tvshowID` ='$tvshowID' AND `movieID` ='$movieID';");
$stmtList->execute();

$stmtTV = $pdo->prepare("SELECT * FROM `tvshows` WHERE `tvshowID` = '$tvshowID';");
$stmtTV->execute();
$rowTV = $stmtTV->fetch();

$stmtMovie = $pdo->prepare("SELECT * FROM `movies` WHERE `movieID` = '$movieID';");
$stmtMovie->execute();
$rowMovie = $stmtMovie->fetch();
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
		<title>MY LISTS</title>

	</head>
	<body>
		<main>
				
			<div class="createBtn">
				<a href="lists-create.php"><button>Create List</button></a>
			</div>
			
			<?php while($rowList = $stmtList->fetch()){ ?>
        <h2><?php echo($row["listName"]); ?></h2>
        <div class="row">
          <?php while($rowTV = $stmtTV->fetch()){?>
            <div class="tile">
						<a href="/RateFlix/show-detail.php?showID=<?php echo($row['showID']);?>&userID=<?php echo($userID);?>"><img class="tileImg" src="<?php echo($rowMovie["images"]);?>"/></a>
					</div>
            <?php }; ?>

    			<?php	while ($rowMovie = $stmtMovie->fetch()){ ?>
					<div class="tile">
						<a href="/RateFlix/movie-detail.php?movieID=<?php echo($row['movieID']);?>&userID=<?php echo($userID);?>"><img class="tileImg" src="<?php echo($rowMovie["images"]);?>"/></a>
					</div>
				  <?php }; ?>
        </div>
        <div class="editReview"> 
          <li class="editReviewBtn">
            <a href="/RateFlix/show-detail.php?tvshowID=<?php echo($row['tvshowID']);?>&userID=<?php echo($userID);?>"><i class="fas fa-edit"></i></a>
          </li>
          <li class="deleteReviewBtn">
            <a href="lists-delete.php?listID=<?php echo($row["listID"]);?>&userID=<?php echo($userID);?>"><i class="fas fa-trash"></i></a>
          </li>
        </div>
			<?php }; ?>
			
		</main>
		
		<?php include("includes/footer.php"); ?>

	</body>
</html>
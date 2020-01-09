<?php session_start();

$userID = $_SESSION["userID"];
if (isset($_SESSION['userID'])){

include('includes/db-config.php');

include("includes/header.php");

$stmtList = $pdo->prepare("SELECT * FROM `lists` WHERE `userID` = '$userID';");
$stmtList->execute();


?>
<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" />
		<meta name="description" content="rating movies and tvshows" />
		<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/home.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
		<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
		<title>MY LISTS</title>

	</head>
	<body>
		<main>
				
			<!-- <div class="createBtn">
				<a href="lists-create.php"><button class="create-button">Create List</button></a>
			</div> -->
		
			<?php while($rowList = $stmtList->fetch()){ 
				$listID = $rowList["listID"];?>
			<!-- <div class="list-show"> -->
        		<div class="show-all-list-row" id="<?php echo($rowList['listID']);?>"> 
        			<input id="listTextInput" type="text" name="listName" class="listName" value="<?php echo($rowList["listName"]); ?>" />
		        	<li class="editReviewBtn">
		            	<a><i class="fas fa-edit"></i></a>
		            </li>
		            <li class="deleteReviewBtn">
		            	<a href="lists-delete.php?listID=<?php echo($rowList["listID"]);?>&userID=<?php echo($userID);?>"><i class="fas fa-trash"></i></a>
		          	</li>
		        </div>
        		<div class="list-row">
		        <?php 
		        $stmt = $pdo->prepare("SELECT * FROM `tvshows-movies-lists` WHERE `listID` = '$listID' ");
				$stmt->execute();
				while($row = $stmt->fetch()){
					$tvshowID = $row["tvshowID"];
					$movieID = $row["movieID"];

					if (isset($tvshowID)) {
			        	$stmtTV = $pdo->prepare("SELECT * FROM `tvshows-movies-lists` INNER JOIN `tvshows` ON `tvshows-movies-lists`.`tvshowID`=`tvshows`.`tvshowID` WHERE `tvshows-movies-lists`.`tvshowID`='$tvshowID' AND `tvshows-movies-lists`.`listID` = '$listID';");
						$stmtTV->execute();?>
					
			        	<?php while($rowTV = $stmtTV->fetch()){?>
			        		<div class="tile">
								<a href="/RateFlix/show-detail.php?tvshowID=<?php echo($row['tvshowID']);?>&userID=<?php echo($userID);?>"><img class="tileImg" src="<?php echo($rowTV["images"]);?>"/></a>
							</div>
			            <?php }; ?>

		    			<?php	
					} else if (isset($movieID)) {
						$stmtMovie = $pdo->prepare("SELECT * FROM `tvshows-movies-lists` INNER JOIN `movies` ON `tvshows-movies-lists`.`movieID`=`movies`.`movieID` WHERE `tvshows-movies-lists`.`movieID`='$movieID' AND `tvshows-movies-lists`.`listID` = '$listID';");
						$stmtMovie->execute();

		    			while($rowMovie = $stmtMovie->fetch()){ ?>
							<div class="tile">
								<a href="/RateFlix/movie-detail.php?movieID=<?php echo($row['movieID']);?>&userID=<?php echo($userID);?>"><img class="tileImg" src="<?php echo($rowMovie["images"]);?>"/></a>
							</div>
					  <?php };
					} ?>

    		<?php }; ?>
    	</div>
		       
			<?php }; ?>
			
		</main>
			<script type="text/javascript" src="/RateFlix/JS/lists-show-all.js"></script>
		<?php include("includes/footer.php"); } else { header("Location: landingpage.php"); }?>



	</body>
</html>
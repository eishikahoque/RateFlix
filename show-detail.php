<?php session_start();

include("includes/db-config.php");

$tvshowID = $_GET["tvshowID"];
$userID = $_GET["userID"];

$stmt = $pdo->prepare("SELECT * FROM `tvshows` WHERE `tvshowID`='$tvshowID'");
$stmt->execute();

$row = $stmt->fetch();

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
  <link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
  <title><?php echo($row["name"]);?></title>
</head>
<body>
  <?php include("includes/header.php") ?>	
  <main class="main-container">
    <section>
      <img class="main-image" src="<?php echo($row["images"]);?>" />
    </section>
    <section class="align-middle-fixed">
      <div class="first-line">
        <h1><? echo($row["name"]); ?></h1>
        <button class="btn">+ Lists</button><button class="btn">Share</button>
      </div>
        <div class="second-line">
          <h2><?php echo($row["releaseYear"]); ?></h2>
          <h2><?php echo($row["tvRating"]); ?></h2>
          <h2><?php echo($row["season"]); ?> Seasons</h2>
          <h2><?php echo($row["episodes"]); ?> Episodes</h2>
            
          <?php
            $rateAvg = $pdo->prepare("SELECT AVG(`myRating`) as avrg FROM `tvshows-rating` WHERE `tvshowID` = '$tvshowID'");
            $rateAvg->execute();
            $rowAVG = $rateAvg->fetch();
            if ($rowAVG["avrg"] === NULL) {
              $rowAVG["avrg"] = 0;
            } 
          ?>
            <div class="stars" style="--rating: <?php echo($rowAVG["avrg"]); ?>;"></div>

        </div>
        <p><? echo($row["blurb"]); ?></p>
        <div class="same-line">
          <h3>Genre:</h3><p><?php echo($row["genre"]);?></p>
        </div>
        <div class="same-line">
          <h3>Starring:</h3>
          <p>
          <?php 
            $stmtActor = $pdo->prepare("SELECT * FROM `actors` INNER JOIN `tvshows-actor` ON `actors`.`actorID`=`tvshows-actor`.`actorID` WHERE `tvshows-actor`.`tvshowID`='$tvshowID';");
            $stmtActor->execute();
            $castNamesList = "";
            while ($row = $stmtActor->fetch()) {
              $castNamesList .= $row["fname"]." ".$row["mname"]." ".$row["lname"].", ";
            }

            echo rtrim($castNamesList, ", "); ?>

          </p>
        </div>
        
      </div>
      <h3>Reviews</h3>
        <?php			
        $stmt = $pdo->prepare("SELECT * FROM `tvshows-review` WHERE `tvshowID`='$tvshowID' ");
        $stmt->execute();?>
        <div class="review-row">
          
          <?php while($row = $stmt->fetch()){ ?>

            <p class="reviewCard"><?php echo($row["review"]);?></p>

          <?php }; ?>
          
        </div>
    </section>
    <section>
      <h3>Your Rating</h3>
      
      <form>
        
        <div class="rating">
          <input name="myrating" type="radio" value="5" /><span>☆</span><input name="myrating" type="radio" value="4" /><span>☆</span><input name="myrating" type="radio" value="3" /><span>☆</span><input name="myrating" type="radio" value="2" /><span>☆</span><input name="myrating" type="radio" value="1" /><span>☆</span>
        </div>

        <input type="hidden" name="userID" value="<?php echo($userID); ?>" >

        <input type="hidden" name="tvshowID" value="<?php echo($tvshowID); ?>" >

        <button id="rateBtn">Rate</button>
      </form>
      <h3>Write a Review</h3>
        <textarea rows="10" cols="40" id="myReview"></textarea>
        <div class="submitReviewBtn-row">
          <div class="characters">
          <span id="characterCount">0</span> /300 </div>
          <button id="submitReview" class="submitReviewBtn">Submit</button>
        </div>
        
      <h3>More like this</h3>
      <?php
        $stmt = $pdo->prepare("SELECT * FROM `tvshows` ORDER BY RAND() LIMIT 3");
        $stmt->execute();?>
        <div class="tile">
        <?php while($row = $stmt->fetch()){ ?>
        
          <a href="/RateFlix/show-detail.php?tvshowID=<?php echo($row['tvshowID']);?>&userID=<?php echo($userID);?>"><img class="tileImg" src="<?php echo($row["images"]);?>"/></a>
        <?php }; ?>
        </div>
    </section>
  </main>
  <script type="text/javascript" src="/RateFlix/JS/details-page.js"></script>
  <?php include("includes/footer.php"); ?> 
</body>x
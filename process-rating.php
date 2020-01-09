<?php
session_start();
$userID = $_SESSION["userID"];
include("includes/db-config.php");

$rating = $_POST['rating'];
$userID = $_POST['userID'];
$tvshowID = $_POST['tvshowID'];

$stmt1 = $pdo->prepare("
  SELECT COUNT(*) as rating_count FROM `tvshows-rating`
  WHERE `tvshowID` = '$tvshowID'
  AND `userID` = '$userID'
  ");

$stmt1->execute();

$row1 = $stmt1->fetch();

if ($row1['rating_count'] > 0) {
  $stmt2 = $pdo->prepare("
    UPDATE `tvshows-rating`
    SET `myRating`='$rating'
    WHERE `tvshowID` = '$tvshowID' AND `userID` = '$userID'
  ");
} else {
  $stmt2 = $pdo->prepare("
    INSERT INTO `tvshows-rating`(`tvshowID`, `userID`, `myRating`)
    VALUES ('$tvshowID', '$userID', '$rating')
  ");
}

$stmt2->execute();

echo('{"success": "true"}');
?>
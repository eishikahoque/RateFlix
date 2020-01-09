<?php session_start();
$userID = $_SESSION["userID"];
include("includes/db-config.php");

$rating = $_POST['rating'];
$userID = $_POST['userID'];
$movieID = $_POST['movieID'];

$stmt1 = $pdo->prepare("
  SELECT COUNT(*) as rating_count FROM `movies-rating`
  WHERE `movieID` = '$movieID'
  AND `userID` = '$userID'
  ");

$stmt1->execute();

$row1 = $stmt1->fetch();

if ($row1['rating_count'] > 0) {
  $stmt2 = $pdo->prepare("
    UPDATE `movies-rating`
    SET `myRating`='$rating'
    WHERE `movieID` = '$movieID' AND `userID` = '$userID'
  ");
} else {
  $stmt2 = $pdo->prepare("
    INSERT INTO `movies-rating`(`movieID`, `userID`, `myRating`)
    VALUES ('$movieID', '$userID', '$rating')
  ");
}

$stmt2->execute();
$row2 = $stmt2->fetch();

if ($row1['rating_count'] > 0 || $row2) {
  echo('{"success": "true"}');
} else {
  echo('{"success": "false"}');
}
?>
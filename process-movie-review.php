<?php
include("includes/db-config.php");

$review = addslashes($_POST['review']);
$userID = $_POST['userID'];
$movieID = $_POST['movieID'];

$stmt1 = $pdo->prepare("
  SELECT COUNT(*) as review_count FROM `movies-review`
  WHERE `movieID` = '$movieID'
  AND `userID` = '$userID'
  ");

$stmt1->execute();

$row1 = $stmt1->fetch();

if ($row1['review_count'] > 0) {
  $stmt2 = $pdo->prepare("
    UPDATE `movies-review`
    SET `review`='$review'
    WHERE `movieID` = '$movieID' AND `userID` = '$userID'
  ");
} else {
  $stmt2 = $pdo->prepare("
    INSERT INTO `movies-review`(`reviewID`, `movieID`, `userID`, `review`)
    VALUES (NULL, '$movieID', '$userID', '$review')
  ");
}

$stmt2->execute();
$row2 = $stmt2->fetch();

if ($row1['review_count'] > 0 || $row2) {
  echo('{"success": "true"}');
} else {
  echo('{"success": "false"}');
}
?>
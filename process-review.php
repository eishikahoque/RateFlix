<?php session_start();
$userID = $_SESSION["userID"];
include("includes/db-config.php");

$review = addslashes($_POST['review']);
$userID = $_POST['userID'];
$tvshowID = $_POST['tvshowID'];

$stmt1 = $pdo->prepare("
  SELECT COUNT(*) as review_count FROM `tvshows-review`
  WHERE `tvshowID` = '$tvshowID'
  AND `userID` = '$userID'
  ");

$stmt1->execute();

$row1 = $stmt1->fetch();

if ($row1['review_count'] > 0) {
  $stmt2 = $pdo->prepare("
    UPDATE `tvshows-review`
    SET `review`='$review'
    WHERE `tvshowID` = '$tvshowID' AND `userID` = '$userID'
  ");
} else {
  $stmt2 = $pdo->prepare("
    INSERT INTO `tvshows-review`(`reviewID`, `tvshowID`, `userID`, `review`)
    VALUES (NULL, '$tvshowID', '$userID', '$review')
  ");
}

$stmt2->execute();
$row2 = $stmt2->fetch();

echo('{"success": "true"}');

?>
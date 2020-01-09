<?php session_start();
include("includes/db-config.php");

$listID = isset($_POST['listID']) ? $_POST['listID'] : null;
$listName = isset($_POST['listName']) ? $_POST['listName'] : null;
$movieID = $_POST['movieID'];
$userID = $_SESSION["userID"];


if ($listID === null) {

	$stmt1 = $pdo->prepare("
		INSERT INTO `lists`(`listID`, `listName`, `userID`)
		VALUES (NULL, '$listName', '$userID')
  	");

	$stmt1->execute();

	$stmt2 = $pdo->prepare("
		SELECT
		    *
		FROM
		    `lists`
		WHERE
		    `listName` = '$listName' AND `userID` = '$userID'
  	");

	$stmt2->execute();

	$row2 = $stmt2->fetch();

	if ($row2["listID"]) {
		$listID = $row2["listID"];
	}
}


$stmt3 = $pdo->prepare("
		INSERT INTO `tvshows-movies-lists`(`listID`, `tvshowID`, `movieID`)
		VALUES ('$listID', NULL, '$movieID')
	");

$stmt3->execute();

echo('{"success": "true"}');

?>
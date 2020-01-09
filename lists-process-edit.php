<?php session_start();

include ("includes/db-config.php");

$listID = $_POST['listID'];
$listName = $_POST['listName'];
$userID = $_SESSION["userID"];

$stmt = $pdo->prepare("
	UPDATE
	    `lists`
	SET
	    `listName` = '$listName'
	WHERE
	    `listID` = '$listID' AND `userID` = '$userID'
  ");

$stmt->execute();

echo('{"success": "true"}');

?>
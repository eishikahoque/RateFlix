<?php

include("../includes/db-config.php");
include("../includes/header.php");

$stmt = $pdo->prepare("SELECT * FROM `tvshows` 
	WHERE
	`name` = 'this is us'
	;");

$stmt->execute();

//display the data
$row = $stmt->fetch(){
	echo(" ");   
	echo($row["image"]);
	echo(" ");
	echo($row["name"]);
	echo(" ");
	echo($row["rating"]);
	echo(" ");
	echo($row["releaseYear"]);
	echo(" "); 
}

?>
<?php

include("includes/header.php"); 
include("includes/db-config.php"); 

?>

<!DOCTYPE html>
<html>

	<head>

		<title>RATEFLIX</title>
		<!-- <link rel="stylesheet" type="text/css" href="includes/header.css" /> -->

	</head>

	<body>
		<h1> continue watching </h1>
		<?php 

			$stmt= $pdo->prepare("
				SELECT * FROM
				`movies`	
				;");

			$stmt->execute();

			while ($row = $stmt->fetch()){
				echo($row["name"]);
			}


		?>

	</body>

</html>
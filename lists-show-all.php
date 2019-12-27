<?php session_start();
if (isset($_SESSION['userID'])){

$userID = $_SESSION["userID"];

include('includes/db-config.php');

include("includes/header.php");

$stmtProduct = $pdo->prepare("SELECT * FROM `product` WHERE `userID` = '$userID';");
$stmtProduct->execute();

$stmtUser = $pdo->prepare("SELECT * FROM `user` WHERE `userID` = '$userID'");
$stmtUser->execute();
$rowUser = $stmtUser->fetch();

?>

<html>
<head> 
	<title>Postings</title>
	<meta charset="utf-8" />
	<meta name="description" content="ToolBot" />
	<meta name="keywords" content="tools, renting, local" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="CSS/styles.css" />

</head>

<main>
		<?php
		$lender = $rowUser["lender"];

		if(isset($userID) && ($lender == 1)){ ?>
			
		<div class="addBtn">
			<a href="create-posting.php"><button>Create Posting</button></a>
		</div>
		<section class="productList">
		<?php

		while($rowProduct = $stmtProduct->fetch()){
			echo('<article class="productBlock">');
			?>
			<div class="productAlter"> 
				<p class="productAlterBtn">
					<a href="edit-posting.php?productID=<?php echo($rowProduct["productID"]); ?>"><i class="fas fa-edit"></i></a>
				</p>
				<p class="productAlterBtn">
					<a href="delete-posting.php?productID=<?php echo($rowProduct["productID"]); ?>"><i class="fas fa-trash"></i></a>
				</p>
			</div>
			<img class= "imgThumbnail" src="<?php echo ($rowProduct['imageUpload']); ?>"/>
			<?php
			echo("<h2 class='heading'>");
			echo($rowProduct["itemName"]);
			echo("</h2>");
			?> 
			<div class="productIcons"> 
			<img src="icons/date.png" class="icon"/>
			<p> <?php echo($rowProduct["rentDate"]); ?> day rental </p>
			</div>

			<div class="productIcons"> 
			<img src="icons/include.png" class="icon"/>
			<p> <?php echo($rowProduct["included"]); ?> </p>
			</div>

			<div class="productIcons">  
			<img src="icons/truck.png" class="icon"/>
			<p> <?php echo($rowProduct["transportOption"]);?> </p>
			</div>

			<p> <span class="bold"> Brand: </span>
			<?php echo($rowProduct["brand"]); ?> </p>

			<p> <span class="bold"> Category: </span>
			<?php echo($rowProduct["type"]); ?>
			</p>
			<p> <span class="bold"> Product Description: </span>
			<?php echo($rowProduct["blurb"]); ?> 
			</p>
			<p>
			<span class="priceBlock"> $ <span class="price"> <?php echo($rowProduct["price"]); ?> </span> /day </span> 
			</p>
			<?php
			echo ("</article>");
			}
		echo("</section>");
		} else if(isset($userID) && ($lender == 0)){ ?>
			<h1> Looks Like You're Not a Lender Yet </h1>
			<p> Want to rent out your tools? Becoming a lender with ToolBot only takes a few seconds
			and provides endless benifits, sign up below to get started! </p>
			<a href="lender-signup.php"> <button> Become a Lender </button> </a>
		<?php } ?>
	</main>
	<?php include("includes/footer.php"); ?>
</body>
</html>
<?php } else { header("Location: landing1.php"); } ?>
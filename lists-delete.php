<?php session_start(); 	
if (isset($_SESSION['userID'])){
include("includes/header.php");

$productID = $_GET["productID"]; 
$userID = $_SESSION["userID"]; 

?>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/forms.css">
</head>
<h1>Edit Postings</h1>

<?php

include("includes/db-config.php"); 

$stmt = $pdo->prepare("SELECT * FROM `product` WHERE `productID` = '$productID' AND `userID` = '$userID'"); 

$stmt->execute(); 

$row = $stmt->fetch();

?>
<div class="form">
  <form action="process-edit-posting.php" method="POST" enctype="multipart/form-data">

  <input type="hidden" name="productID" value=<?php echo $_GET["productID"]; ?> />

  <div class="left-form">
	<label for="itemName">Name of Item</label>
	<input class="form-input" type="text" name="itemName" id="itemName" value="<?php echo($row["itemName"]);?>"required/>

	<label for="included">Included</label>
	<input class="form-input" type="text" name="included" id="included" value="<?php echo($row["included"]);?>" required/>

	<label for="blurb">Description</label>
	<textarea class="form-input" id="blurb" name="blurb" type="text" required><?php echo($row["blurb"]);?></textarea>

	<div class="upload-btn">
      <label>UPLOAD IMAGE</label>
      <input type="file" name="image" id="uploadImage" required /> <br>
    </div>

  </div>
  <div class="right-form">
  	<div class="row">
  		<div class="form-element">
			<label for="price">Price($)</label>
			<input type="number" name="price" id="price" min="1" step="0.01" value="<?php echo($row["price"]);?>"  required />
		</div>

		<div class="form-element">
			<label for="rentDate"> Rental Period </label>
			<select name="rentDate" id="rentDate" value="<?php echo($row["rentDate"]);?>">
				<option value="3"> 3 Days </option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-element">
			<label> Brand </label>
			<select name="brand" id="brand" value="<?php echo($row["brand"]);?>">
				<option value="blackDecker"> Black + Decker </option>
				<option value="bosch"> Bosch </option>
				<option value="dewalt"> Dewalt </option>
				<option value="mastercraft"> Mastercraft </option>
				<option value="milwaukee"> Milwaukee </option>
				<option value="ryobi"> Ryobi </option>
				<option value="other"> Other </option>
			</select>
		</div>

		<div class="form-element">
			<label for="type"> Type </label>
			<select name="type" id="toolType" value="<?php echo($row["type"]);?>">
				<option value="powerTool"> Power Tool </option>
				<option value="handTool"> Hand Tool </option>
				<option value="plumbing"> Plumbing </option>
				<option value="outdoors"> Outdoors </option>
				<option value="others"> Others </option>
			</select>
		</div>

	</div>
	<div class="row">

		<div class="form-element">
			<label for="city"> City </label>
			<select name="location" id="location" value="<?php echo($row["location"]);?>">
				<option value="mississauga"> Mississauga </option>
				<option value="northYork"> North York </option>
				<option value="oakville"> Oakville </option>
				<option value="scarborough"> Scarborough </option>
				<option value="toronto"> Toronto </option> 
			</select>
		</div>

		<div class="form-element">
			<label for="transportOption"> Delivery/Pick Up </label> 
			<select name="transportOption" id="transportOption" value="<?php echo($row["transportOption"]);?>">
				<option value="delivery"> Delivery </option>
				<option value="pickup"> Pick Up </option>
				<option value="both"> Both </option>
			</select>
		</div>

	</div>
	</div>
	</div>
	<div class="submit-button-row">
		<input type="submit" value="Edit Posting" id="submitPosting" class="submit-button" />
	</div>
</form>
<?php
include("includes/footer.php");
?>

<?php } else { header("Location: landing1.php"); } ?>

<?php session_start();
if (isset($_SESSION['userID'])){
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="ToolBot" />
	<meta name="keywords" content="tools, renting, local" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Narrow&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/ToolBot/CSS/forms.css">

	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
	<?php include("includes/header.php"); ?>
</head>
<body>

<div class="form">
<form action="process-create-posting.php" method="POST" enctype="multipart/form-data">
  <div class="left-form">
	<label for="itemName">Name of Item</label>
	<input class="form-input" type="text" name="itemName" id="itemName" placeholder="Item Name" required/>

	<label for="included">Included</label>
	<input class="form-input" type="text" name="included" id="included" placeholder="Included Items" required/>

	<label for="blurb">Description</label>
	<textarea class="form-input" name="blurb" type="text" placeholder="Insert Item Description Here" required id="blurb"></textarea>

	<div class="upload-btn">
      <label>UPLOAD IMAGE</label>
      <input type="file" name="image" id="uploadImage" required /> <br>
    </div>

  </div>
  <div class="right-form">
  	<div class="row">
  		<div class="form-element">
			<label for="price">Price($)</label>
			<input type="number" name="price" id="price" min="1" step="0.01" required />
		</div>

		<div class="form-element">
			<label for="rentDate"> Rental Period </label>
			<select name="rentDate" id="rentDate">
				<option value=""></option>
				<option value="3"> 3 Days </option>
				<option value="5"> 5 Days </option>
				<option value="10"> 10 Days </option>

			</select>
		</div>
	</div>
	<div class="row">
		<div class="form-element">
			<label> Brand </label>
			<select name="brand" id="brand">
				<option value=""></option>
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
			<select name="type" id="toolType">
				<option value=""></option>
				<option value="powerTool"> Power Tool </option>
				<option value="handTool"> Hand Tool </option>
				<option value="plumbing"> Plumbing </option>
				<option value="outdoor"> Outdoors </option>
				<option value="others"> Others </option>
			</select>
		</div>

	</div>
	<div class="row">

		<div class="form-element">
			<label for="city"> City </label>
			<select name="location" id="location">
				<option value=""></option>
				<option value="mississauga"> Mississauga </option>
				<option value="northYork"> North York </option>
				<option value="oakville"> Oakville </option>
				<option value="scarborough"> Scarborough </option>
				<option value="toronto"> Toronto </option> 
			</select>
		</div>

		<div class="form-element">
			<label for="transportOption"> Delivery/Pick Up </label> 
			<select name="transportOption" id="transportOption">
				<option value=""></option>
				<option value="delivery"> Delivery </option>
				<option value="pickup"> Pick Up </option>
				<option value="both"> Both </option>
			</select>
		</div>

	</div>
</div>
</div>

</form>

<div class="submit-button-row">
	<button id="submitPosting" class="submit-button">Add Posting</button>
</div>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="JS/create-posting.js"></script>
</body>
</html>

<?php
} else {
	header("Location: landing1.php");
} ?>

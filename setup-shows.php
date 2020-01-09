<?php session_start();
$userID = $_SESSION["userID"];
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Profile - Tv Shows</title>
		<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/setup.css">
	</head>

	<body>		
	<?php if (isset($_SESSION['userID'])){ ?>
		<!-- <span class="logo" href="/RateFlix/home.php">RateFlix</span> -->

		<h1>Kick start your profile</h1>

		<h2>Favourite Tv Shows</h2>
			<form>
				<div class="setuppage">
					<div class="column">
						<input type="checkbox" class="hidden" name="shows[]" id="friends" value="friends"><label for="friends">Friends</label>
						<input type="checkbox" class="hidden" name="shows[]" id="gossipGirl" value="gossipGirl"><label for="gossipGirl">Gossip Girl</label>
						<input type="checkbox" class="hidden" name="shows[]" id="nikita" value="nikita"><label for="nikita">Nikita</label>
						<input type="checkbox" class="hidden" name="shows[]" id="newGirl" value="newGirl"><label for="newGirl">New Girl</label>
						<input type="checkbox" class="hidden" name="shows[]" id="arrow" value="arrow"><label for="arrow">Arrow</label>
						<input type="checkbox"class="hidden" name="shows[]" id="daredevil" value="daredevil"><label for="daredevil">Daredevil</label>
					</div>
					<div class="column2">
						<input type="checkbox" class="hidden" name="shows[]" id="patriotAct" value="patriotAct"><label for="patriotAct">Patriot Act</label>
						<input type="checkbox" class="hidden" name="shows[]" id="gilmoreGirl" value="gilmoreGirl"><label for="gilmoreGirl">Gilmore Girls</label>
						<input type="checkbox" class="hidden" name="shows[]" id="greysAnatomy" value="greysAnatomy"><label for="greysAnatomy">Grey's Anatomy</label>
						<input type="checkbox" class="hidden" name="shows[]" id="houseOfCards" value="houseOfCards"><label for="houseOfCards">House of Cards</label>
						<input type="checkbox" class="hidden" name="shows[]" id="designatedSurvivor" value="designatedSurvivor">	<label for="designatedSurvivor">Designated Survivor</label>
						<input type="checkbox" class="hidden" name="shows[]" id="flash" value="flash"><label for="flash">Flash</label>
					</div>
					<div class="column3">
						<input type="checkbox" class="hidden" name="shows[]" id="theOffice" value="theOffice"><label for="theOffice">The Office</label>
						<input type="checkbox" class="hidden" name="shows[]" id="thisIsUs" value="thisIsUs"><label for="thisIsUs">This is Us</label>
						<input type="checkbox" class="hidden" name="shows[]" id="riverdale" value="riverdale"><label for="riverdale">Riverdale</label>
						<input type="checkbox" class="hidden" name="shows[]" id="gameOfThrones" value="gameOfThrones"><label for="gameOfThrones">Game of Thrones</label>
						<input type="checkbox" class="hidden" name="shows[]" id="lucifer" value="lucifer"><label for="lucifer">Lucifer</label>
						<input type="checkbox" class="hidden" name="shows[]" id="prisonBreak" value="prisonBreak"><label for="prisonBreak">Prison Break</label>
					</div>
					<div class="column4">
						<input type="checkbox" class="hidden" name="shows[]" id="quantico" value="quantico"><label for="quantico">Quantico</label>
						<input type="checkbox" class="hidden" name="shows[]" id="sherlock" value="sherlock"><label for="sherlock">Sherlock</label>
						<input type="checkbox" class="hidden" name="shows[]" id="homeland" value="homeland"><label for="homeland">Homeland</label>
						<input type="checkbox" class="hidden" name="shows[]" id="narcos" value="narcos"><label for="narcos">Narcos</label>
						<input type="checkbox" class="hidden" name="shows[]" id="brooklynNineNine" value="brooklynNineNine"><label for="brooklynNineNine">Brooklyn Nine-Nine</label>
						<input type="checkbox" class="hidden" name="shows[]" id="strangerThings" value="strangerThings"><label for="strangerThings">Stranger Things</label>
					</div>
				</div>
			</form>
		<div class="btn">
			<button class="laterBtn" id="btn-hidden"></button>
			<p id="btn-status">4/4</p>
			<button class="nextBtn" id="showSubmit">Done</button>
		</div>
	
		<script type="text/javascript" src="JS/setup.js"></script>
	<?php } else { header("Location: landingpage.php");} ?>

	</body>

</html>
<?php ?>

<!DOCTYPE html>
<html>

	<head>
		<title>Profile - Movie</title>
		<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/setup.css">
	</head>

	<body>
		<span class="logo" href="/RateFlix/home.php">RateFlix</span>

		<h1>Kick start your profile</h1>

		<h2>Favourite Movie</h2>
			<form>
				<div class="setuppage">
					<div class="column">
						<input type="checkbox" class="hidden" name="movies[]" id ="drive" value="drive"><label for="drive">Drive</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="batman" value="batman"><label for="batman">Batman</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="missionImpossible" value="missionImpossible"><label for="missionImpossible">Mission Impossible</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="jamesBond" value="jamesBond"><label for="jamesBond">James Bond</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="bourneUltimatum" value="bourneUltimatum"><label for="bourneUltimatum">Bourne Ultimatum</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="tripleFrontier" value="tripleFrontier"><label for="tripleFrontier">Triple Frontier</label>
					</div>
					<div class="column2">
						<input type="checkbox" class="hidden" name="movies[]" id ="londonHasFallen" value="londonHasFallen"><label for="londonHasFallen">London has Fallen</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="rushHour" value="rushHour"><label for="rushHour">Rush Hour</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="avengers" value="avengers"><label for="avengers">Avengers</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="titanic" value="titanic"><label for="titanic">Titanic</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="oceans11" value="oceans11"><label for="oceans11">Oceans 11</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="snitch" value="snitch"><label for="snitch">Snitch</label>
					</div>
					<div class="column3">
						<input type="checkbox" class="hidden" name="movies[]" id ="frozen" value="frozen"><label for="frozen">Frozen</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="coco" value="coco"><label for="coco">Coco</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="ironMan" value="ironMan"><label for="ironMan">Iron Man</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="dumbDumber" value="dumbDumber"><label for="dumbDumber">Dumb & Dumber</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="greenMile" value="greenMile"><label for="greenMile">Green Mile</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="forestGump" value="forestGump"><label for="forestGump">Forest Gump</label>
					</div>
					<div class="column4">
						<input type="checkbox" class="hidden" name="movies[]" id ="shawshankRedemption" value="shawshankRedemption"><label for="shawshankRedemption">Shawshank Redemption</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="departed" value="departed"><label for="departed">Departed</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="jumanji" value="jumanji"><label for="jumanji">Jumanji</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="inception" value="inception"><label for="inception">Inception</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="bloodDiamond" value="bloodDiamond"><label for="bloodDiamond">Blood Diamond</label>
						<input type="checkbox" class="hidden" name="movies[]" id ="wreckItRalph" value="wreckItRalph"><label for="wreckItRalph">Wreck It Ralph</label>
					</div>
				</div>
			</form>
		<div class="btn">
			<button class="laterBtn"><a href="/RateFlix/home.php">Later</a></button>
			<p>3/4</p>
			<button class="nextBtn" id="movieSubmit">Next</button>
		</div>

		<script type="text/javascript" src="JS/setup.js"></script>
	</body>

</html>
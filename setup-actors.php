<?php ?>

<!DOCTYPE html>
<html>

	<head>
		<title>Profile - Actor & Actress</title>
		<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/setup.css">
	</head>

	<body>
		<span class="logo" href="/RateFlix/home.php">RateFlix</span>

		<h1>Kick start your profile</h1>

		<h2>Favourite Actors & Actresses</h2>
			<form>
				<div class="setuppage">
					<div class="column">
						<input type="checkbox" class="hidden" name="actors[]" id="bradleyCooper" value="bradleyCooper"><label for="bradleyCooper">Bradley Cooper</label>
						<input type="checkbox" class="hidden" name="actors[]" id="chrisHemsworth" value="chrisHemsworth"><label for="chrisHemsworth">Chris Hemsworth</label>

						<input type="checkbox" class="hidden" name="actors[]" id="dwayneJohnson" value="dwayneJohnson"><label for="dwayneJohnson">Dwayne Johnson</label>
						<input type="checkbox" class="hidden" name="actors[]" id="leonardoDiCaprio" value="leonardoDiCaprio"><label for="leonardoDiCaprio">Leonardo DiCaprio</label>
						<input type="checkbox" class="hidden" name="actors[]" id="mattDamon" value="mattDamon"><label for="mattDamon">Matt Damon</label>
						<input type="checkbox" class="hidden" name="actors[]" id="tomHanks" value="tomHanks"><label for="tomHanks">Tom Hanks</label>
					</div>
					<div class="column2">
						<input type="checkbox" class="hidden" name="actors[]" id="willSmith" value="willSmith"><label for="willSmith">Will Smith</label>
						<input type="checkbox" class="hidden" name="actors[]" id="angelinaJolie" value="angelinaJolie"><label for="angelinaJolie">Angelina Jolie</label>
						<input type="checkbox" class="hidden" name="actors[]" id="amyAdams" value="amyAdams"><label for="amyAdams">Amy Adams</label>
						<input type="checkbox" class="hidden" name="actors[]" id="juliaRoberts" value="juliaRoberts"><label for="juliaRoberts">Julia Roberts</label>
						<input type="checkbox" class="hidden" name="actors[]" id="jenniferAniston" value="jenniferAniston"><label for="jenniferAniston">Jennifer Aniston</label>
						<input type="checkbox" class="hidden" name="actors[]" id="sandraBullocks" value="sandraBullocks"><label for="sandraBullocks">Sandra Bullocks</label>
					</div>
					<div class="column3">
						<input type="checkbox" class="hidden" name="actors[]" id="violaDavis" value="violaDavis"><label for="violaDavis">Viola Davis</label>
						<input type="checkbox" class="hidden" name="actors[]" id="ellenPompeo" value="ellenPompeo"><label for="ellenPompeo">Ellen Pompeo</label>
						<input type="checkbox" class="hidden" name="actors[]" id="mindyKailing" value="mindyKailing"><label for="mindyKailing">Mindy Kailing</label>
						<input type="checkbox" class="hidden" name="actors[]" id="tyBurrell" value="tyBurrell"><label for="tyBurrell">Ty Burrell</label>
						<input type="checkbox" class="hidden" name="actors[]" id="jimParsons" value="jimParsons"><label for="jimParsons">Jim Parsons</label>
						<input type="checkbox" class="hidden" name="actors[]" id="mandyMoore" value="mandyMoore"><label for="mandyMoore">Mandy Moore</label>
					</div>
					<div class="column4">
						<input type="checkbox" class="hidden" name="actors[]" id="miloVentimiglia" value="miloVentimiglia"><label for="miloVentimiglia">Milo Ventimiglia</label>
						<input type="checkbox" class="hidden" name="actors[]" id="blakeLively" value="blakeLively"><label for="blakeLively">Blake Lively</label>
						<input type="checkbox" class="hidden" name="actors[]" id="robertDowneyJr" value="robertDowneyJr"><label for="robertDowneyJr">Robert Downey Jr.</label>
						<input type="checkbox" class="hidden" name="actors[]" id="ryanReynolds" value="ryanReynolds"><label for="ryanReynolds">Ryan Reynolds</label>
						<input type="checkbox" class="hidden" name="actors[]" id="chadMichaelMurray" value="chadMichaelMurray"><label for="chadMichaelMurray">Chad Michael Murray</label>
						<input type="checkbox" class="hidden" name="actors[]" id="chrisEvans" value="chrisEvans"><label for="chrisEvans">Chris Evans</label>
					</div>
				</div>
			</form>
		<div class="btn">
			<button class="laterBtn"><a href="/RateFlix/home.php">Later</a></button>
			<p>2/4</p>
			<button class="nextBtn" id="actorsSubmit">Next</button>
		</div>

		<script type="text/javascript" src="JS/setup.js"></script>

	</body>

</html>
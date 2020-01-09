<?php session_start();
$userID = $_SESSION["userID"];

?>

<!DOCTYPE html>
<html>

	<head>
		<title>Profile - Genre</title>
		<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/setup.css">
	</head>

	<body>
		<!-- <span class="logo" href="/RateFlix/home.php">RateFlix</span> -->

		<?php if (isset($_SESSION['userID'])){ ?>

		<h1>Kick start your profile</h1>

		<h2>Favourite Genres</h2>
			<form>
				<div class="setuppage">				
					<div class="column">
						<input type="checkbox" class="hidden" name="genre[]" id="action" value="action"><label for="action">Action</label>
						<input type="checkbox" class="hidden" name="genre[]" id="anime" value="anime"><label for="anime">Anime</label>
						<input type="checkbox" class="hidden" name="genre[]" id="british" value="british"><label for="british">British</label>
						<input type="checkbox" class="hidden" name="genre[]" id="canadian" value="canadian"><label for="canadian">Canadian</label>
						<input type="checkbox" class="hidden" name="genre[]" id="childrenFamily" value="childrenFamily"><label for="childrenFamily">Children & Family</label>
						<input type="checkbox" class="hidden" name="genre[]" id="comedies" value="comedies"><label for="comedies">Comedies</label>
					</div>
					<div class="column2">
						<input type="checkbox" class="hidden" name="genre[]" id="crime" value="crime"><label for="crime">Crime</label>
						<input type="checkbox" class="hidden" name="genre[]" id="dramas" value="dramas"><label for="dramas">Dramas</label>
						<input type="checkbox" class="hidden" name="genre[]" id="documentaries" value="documentaries"><label for="documentaries">Documentaries</label>
						<input type="checkbox" class="hidden" name="genre[]" id="holidays" value="holidays"><label for="holidays">Holidays</label>
						<input type="checkbox" class="hidden" name="genre[]" id="horror" value="horror"><label for="horror">Horror</label>
						<input type="checkbox" class="hidden" name="genre[]" id="indian" value="indian"><label for="indian">Indian</label>
					</div>
					<div class="column3"> 
						<input type="checkbox" class="hidden" name="genre[]" id="international" value="international"><label for="international">International</label>
						<input type="checkbox" class="hidden" name="genre[]" id="musicMusical" value="musicMusical"><label for="musicMusical">Music & Musical</label>
						<input type="checkbox" class="hidden" name="genre[]" id="mysteries" value="mysteries"><label for="mysteries">Mysteries</label>
						<input type="checkbox" class="hidden" name="genre[]" id="reality" value="reality"><label for="reality">Reality</label>
						<input type="checkbox" class="hidden" name="genre[]" id="romance" value="romance"><label for="romance">Romance</label>
						<input type="checkbox" class="hidden" name="genre[]" id="scienceNature" value="scienceNature"><label for="scienceNature">Science & Nature</label>
					</div>
					<div class="column4">
						<input type="checkbox" class="hidden" name="genre[]" id="scifiFantasy" value="scifiFantasy"><label for="scifiFantasy">Sci-Fi-Fantasy</label>
						<input type="checkbox" class="hidden" name="genre[]" id="standup" value="standup"><label for="standup">Stand-Up</label>
						<input type="checkbox" class="hidden" name="genre[]" id="superhero" value="superhero"><label for="superhero">Superhero</label>
						<input type="checkbox" class="hidden" name="genre[]" id="talkshows" value="talkshows"><label for="talkshows">Talk Shows</label>
						<input type="checkbox" class="hidden" name="genre[]" id="teen" value="teen"><label for="teen">Teen</label>
						<input type="checkbox" class="hidden" name="genre[]" id="thriller" value="thriller"><label for="thriller">Thriller</label>
					</div>
				</div>
			</form>
		<div class="btn">
			<button class="laterBtn"><a href="/RateFlix/home.php">Later</a></button>
			<p>1/4</p>
			<button class="nextBtn" id="genreSubmit">Next</button>
		</div>
	
		<script type="text/javascript" src="JS/setup.js"></script>
	<?php } else { header("Location: landingpage.php");} ?>

	</body>

</html>
<?php session_start();
$userID = $_SESSION["userID"];
?> 
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/home.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>RATEFLIX- Cookie Preferences</title>
</head>
<body>
	<?php include("includes/header.php") ?>
	<?php if (isset($_SESSION['userID'])){ ?>
	<main class="cookie-container">
		<h1>Cookie Preferences</h1>
		<p>
			RateFlix uses cookies for personalization, to customize it's online advertisements, and for other purposes. By interacting with this site, you agree to our use of cookies.
		</p>
		<p>
			If you opt out of advertising cookies, you may still see Netflix ads on other sites, but those ads will not be customized by us or our service providers and we will continue to customize your experience on our website via our use of cookies you have not refused.
		</p>
		<p>
			Alternatively, privacy settings in most browsers will allow you to prevent your browser from accepting new cookies, have it notify you when you receive a new cookie, or disable cookies altogether. If your browser is set to not accept any cookies, you will not receive Interest-Based Advertising, but your use of the Netflix service may be impaired or unavailable. In addition, if you use our cookie tool to opt-out of certain cookies, your opt-out preferences will be remembered by placing a cookie on your device. It is therefore important that your browser is configured to accept cookies for your preferences to take effect. If you delete or clear your cookies, or if you change which web browser you are using, you will need to set your cookie preferences again.
		</p>
	</main>
	<?php } else { ?>
	<main class="cookie-container">
		<h1>Cookie Preferences</h1>
		<p>
			RateFlix uses cookies for personalization, to customize it's online advertisements, and for other purposes. By interacting with this site, you agree to our use of cookies.
		</p>
		<p>
			If you opt out of advertising cookies, you may still see Netflix ads on other sites, but those ads will not be customized by us or our service providers and we will continue to customize your experience on our website via our use of cookies you have not refused.
		</p>
		<p>
			Alternatively, privacy settings in most browsers will allow you to prevent your browser from accepting new cookies, have it notify you when you receive a new cookie, or disable cookies altogether. If your browser is set to not accept any cookies, you will not receive Interest-Based Advertising, but your use of the Netflix service may be impaired or unavailable. In addition, if you use our cookie tool to opt-out of certain cookies, your opt-out preferences will be remembered by placing a cookie on your device. It is therefore important that your browser is configured to accept cookies for your preferences to take effect. If you delete or clear your cookies, or if you change which web browser you are using, you will need to set your cookie preferences again.
		</p>
	</main>
	<?php }?> 
	<?php include("includes/footer.php") ?>
</body>
</html>

<?php session_start();
$userID = $_SESSION["userID"];
?> 
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, RateFlix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/CSS/home.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="/RateFlix/favicomatic/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/RateFlix/favicomatic/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/RateFlix/favicomatic/favicon-16x16.png">
	<title>RATEFLIX-Terms of Use</title>
</head>
<body>
	<?php include("includes/header.php") ?>
	<?php if (isset($_SESSION['userID'])){ ?>
	<main class="tou-container">
		<h1>RateFlix Terms of Use</h1>
		<p>
			These Terms of Use govern your use of our service. As used in these Terms of Use,  Rateflix service", "our service" or "the service" means the personalized service provided by Rateflix for discovering  content, including all features and functionalities, recommendations and reviews, the website, and user interfaces, as well as all content and software associated with our service.
		</p>
		<p>
			You must be 18 years of age, or the age of majority in your province, territory or country, to become a member of the Rateflix service. Minors may only use the service under the supervision of an adult.
		</p>
		<p>
			The Rateflix service, including the content library, is regularly updated. In addition, we continually test various aspects of our service, including our website, user interfaces, promotional features and availability of Rateflix content.
		</p>
		<p>
			You agree to use the RateFlix service, including all features and functionalities associated therewith, in accordance with all applicable laws, rules and regulations, or other restrictions on use of the service or content therein. You agree not to archive, reproduce, distribute, modify, display, perform, publish, license, create derivative works from, offer for sale, or use (except as explicitly authorized in these Terms of Use) content and information contained on or obtained from or through the RateFlix service. You also agree not to: circumvent, remove, alter, deactivate, degrade or thwart any of the content protections in the RateFlix service; use any robot, spider, scraper or other automated means to access the RateFlix service; decompile, reverse engineer or disassemble any software or other products or processes accessible through the RateFlix service; insert any code or product or manipulate the content of the RateFlix service in any way; or use any data mining, data gathering or extraction method. In addition, you agree not to upload, post, e-mail or otherwise send or transmit any material designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment associated with the RateFlix service, including any software viruses or any other computer code, files or programs. We may terminate or restrict your use of our service if you violate these Terms of Use or are engaged in illegal or fraudulent use of the service.
		</p>
		<p>
			 Changes to Terms of Use and Assignment. RateFlix may, from time to time, change these Terms of Use. We will notify you at least 30 days before such changes apply to you. We may assign or transfer our agreement with you including our associated rights and obligations at any time and you agree to cooperate with us in connection with such an assignment or transfer.
		</p>
	</main>
	
	<?php include("includes/footer.php") ?>
	<?php } else { header("Location: landingpage.php");} ?>

</body>
</html>

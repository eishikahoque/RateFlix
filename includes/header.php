<?php  ?>

<head>

	<meta charset="utf-8" />
	<meta name="description" content="rating movies and tvshows" />
	<meta name="keywords" content="rate, movies, tvshows, lists, share, netflix" />

	<link rel="stylesheet" type="text/css" href="/RateFlix/includes/CSS/header.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Roboto+Condensed:400,700|Yanone+Kaffeesatz:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/61799bdb29.js" crossorigin="anonymous"></script>
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

</head>

<nav id="nav">
	<ul class="nav-bar">
		<span class="logo">RateFlix</span>
		<?php if (isset($_SESSION['userID'])){ ?>
			<div class="login-header">
				<div class="header-search-form">
					<form id="searchForm" action="/RateFlix/process-search.php" method="POST">
						<i class="fas fa-search"></i>
						<input class="search-bar" type="text" name="searchTerm" id="txtName" placeholder="Search..." />
					</form>
				</div>
				<div class="nav-item-container">
					<li class="nav-item">
						<a href="/RateFlix/tvshow-page.php">Shows</a>
					</li>
					<li class="nav-item">
						<a href="/RateFlix/movie-page.php">Movies</a>
					</li>
					<li class="nav-item">
						<a href="/RateFlix/mylist.php">My Lists</a>
					</li>
					<li class="nav-item">
						<a href=""><i class="far fa-user"></i></a>
					</li>
				</div>
			</div>
		<?php } else { ?>
			<div class="landing-buttons">
				<button><a href="/RateFlix/signup-form.php">Sign Up</a></button>
				<button><a href="/RateFlix/login-form.php">Login</a></button>
			</div>
		<?php } ?>
		
	</ul>
</nav>


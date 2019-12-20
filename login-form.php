<?php 

?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<title>Login to RateFlix</title>
		<link rel="stylesheet" type="text/css" href="CSS/login.css" />

	</head>

	<body>
		<?php include("includes/header.php") ?>	
		<h1>Login</h1>
		<div class="login-form form">
    		<form id="loginForm" name="loginForm" >
			    <div class="row">
			    <label for="email">E-mail</label> <span id="error-email"></span>
			    <input class="form-input" id="email" type="text" name="email" placeholder="E-mail address" required>
			    </div>
			    <div class="row">
			        <label for="password">Password</label> <span id="error-password"></span>
			        <div id="passwordRow" class="pass-row">
							<input id="passwordField" class="form-input" type="password" name="password" minlength="8" maxlength="12" placeholder="Password" required>
			        	<i id="passwordIcon" class="far fa-eye-slash" class="far fa-eye"></i>
			    	</div>
			    </div>
      </form>
      
      <div class="submit-button-row">
          <button id="submitBtn" class="submit-button">Login</button>
      </div>
      <div class="sub-reminder">
          <p>Don't have an account? 
          <a href="signup-form.php" class="clickme">Register now</a></p>
      </div>
      <div class="sub-reminder">
          <p><a href="forgot-password.php" class="clickme">Forgot your password?</a></p>
      </div>
		</div>

	<?php include("includes/footer.php"); ?>

	<script type="text/javascript" src="JS/login-form.js"></script>

	</body>

</html>
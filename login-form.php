<?php 

?>
<!DOCTYPE html>
<html>

	<head>

		<title>Login to RateFlix</title>
		<link rel="stylesheet" type="text/css" href="CSS/login.css" />

		<script>
	    	function viewPassword(){
	        	var passwordInput = document.getElementById("password-field");
	        	var passStatus = document.getElementById("pass-status");

	        	if(passwordInput.type == "password"){
	        		passwordInput.type="text";
	        		passStatus.className= "far fa-eye";
	        	}else if(passwordInput.type == "text"){
	        		passwordInput.type="password";
	        		passStatus.className ="far fa-eye-slash";
	        	}
	     	}
    	</script>
	</head>

	<body>
		<?php include("includes/header.php") ?>	
		<h1>Login</h1>
		<div class="login-form form">
    		<form action="process-login-form.php" method="POST" id="loginForm" name="loginForm" >
			    <div class="row">
			    <label for="email">E-mail</label> <span id="error-email"></span>
			    <input class="form-input" id="email" type="text" name="email" placeholder="E-mail address" required>
			    </div>
			    <div class="row">
			        <label for="password">Password</label> <span id="error-password"></span>
			        <div class="pass-row">
						<p class="password-wrapper">
							<input id="password-field" class="form-input" type="password" name="password" minlength="8" maxlength="12" placeholder="Password" required>
						</p>
			        	<!-- <i id="pass-status" class="far fa-eye-slash" class="far fa-eye" onclick="viewPassword()"></i> -->
			    	</div>
			    </div>

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
			</form>
		</div>

	<?php include("includes/footer.php"); ?>

	<script type="text/javascript" src="JS/login-form.js"></script>

	</body>

</html>
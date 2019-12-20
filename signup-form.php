<?php 

?>
<!DOCTYPE html>
<html>

	<head>

		<title>Sign Up to RateFlix</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css" />

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
	     	function viewRePassword(){
	        	var repasswordInput = document.getElementById("repassword-field");
	        	var repassStatus = document.getElementById("repass-status");

	        	if(repasswordInput.type == "password"){
	        		repasswordInput.type="text";
	        		repassStatus.className= "far fa-eye";
	        	}else if(repasswordInput.type == "text"){
	        		repasswordInput.type="password";
	        		repassStatus.className ="far fa-eye-slash";
	        	}
	     	}
    	</script>
	</head>

	<body>
		<?php include("includes/header.php") ?>	
		<h1>Sign Up</h1>
		<div class="signup-form form">
    		<form action="process-login-form.php" method="POST" id="signupForm" name="signupForm" >
    			<div class="row">
          			<label class="form-label" for="fname">First Name</label> <input class="form-input" id="firstName" name="firstName" type="input" placeholder="Insert first name" required />

         			 <label class="form-label" for="lname">Last Name</label> <input class="form-input" id="lastName" name="lastName" type="input" placeholder="Insert last name" required />
         		</div>

			    <div class="row">
			    <label for="email">E-mail</label> <span id="error-email"></span>
			    <input class="form-input" id="email" type="text" name="email" placeholder="E-mail address" required>
			    </div>

			    <div class="row">
			        <label for="password">Password</label> <span id="error-password"></span>
			        <div class="pass-row">
			        	<input id="password-field" class="form-input" type="password" name="password" minlength="8" maxlength="12" placeholder="Password" required>
			        	<i id="pass-status" class="far fa-eye-slash" class="far fa-eye" onclick="viewPassword()"></i>
			    	</div>
			    </div>
			    <div class="row">
				    <label for="repassword" class="form-label">Re-TypePassword</label>
			            <div class="pass-row">
			              <input id="repassword-field" class="form-input" type="password" name="passwordRetype" minlength="8" maxlength="12" placeholder="Password">
			               <i id="repass-status" class="far fa-eye-slash" class="far fa-eye" onclick="viewRePassword()"></i>
			             </div>
			           </div>
		        </div>
			    <div class="submit-button-row">
			        <button id="submitBtn" class="submit-button">Sign Up</button>
			    </div>

			    

			</form>
		</div>

	<?php include("includes/footer.php");?>

	</body>

</html>
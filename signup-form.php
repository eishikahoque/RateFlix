<?php 

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Sign Up to RateFlix</title>
    <link rel="stylesheet" type="text/css" href="CSS/signup.css" />

  </head>

  <body>
    <?php include("includes/header.php") ?>	
    <h1>Sign Up</h1>
    <div class="signup-form form">
        <form action="process-login-form.php" method="POST" id="signupForm" name="signupForm">
          <div class="row">
            <label class="form-label" for="fname">First Name</label>
            <input class="form-input" id="firstName" name="firstName" type="input" placeholder="Insert first name" required />

            <label class="form-label" for="lname">Last Name</label>
            <input class="form-input" id="lastName" name="lastName" type="input" placeholder="Insert last name" required />
          </div>

          <div class="row">
            <label for="email">E-mail</label>
            <input class="form-input" id="email" type="text" name="email" placeholder="E-mail address" required>
          </div>

          <div class="row">
            <label for="password">Password</label>
            <div id="passwordRow" class="pass-row">
              <input id="passwordField" class="form-input" type="password" name="password" minlength="8" maxlength="12" placeholder="Password" required>
              <i id="passwordStatus" class="far fa-eye-slash" class="far fa-eye"></i>
            </div>
          </div>

          <div class="row">
            <label for="repassword" class="form-label">Re-Type Password</label>
            <div id="repasswordRow" class="pass-row">
              <input id="repasswordField" class="form-input" type="password" name="passwordRetype" minlength="8" maxlength="12" placeholder="Password">
              <i id="repasswordStatus" class="far fa-eye-slash" class="far fa-eye"></i>
            </div>
          </div>
        </form>
      <div class="submit-button-row">
        <button id="submitBtn" class="submit-button">Sign Up</button>
      </div>
    </div>

  <?php include("includes/footer.php"); ?>
  
  <script type="text/javascript" src="JS/signup-form.js"></script>

  </body>

</html>
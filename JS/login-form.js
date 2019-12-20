document.getElementById('passwordIcon').addEventListener('click', viewPassword);
document.getElementById('submitBtn').addEventListener('click', submitForm);

var email = document.getElementById('email');
var password = document.getElementById('passwordField');

var loginErrors = false;

function viewPassword() {
  var passwordInput = document.getElementById('passwordField');
  var passStatus = document.getElementById('passwordIcon');

  if (passwordInput.type == 'password') {
    passwordInput.type='text';
    passStatus.className= 'far fa-eye';
  } else if (passwordInput.type == 'text') {
    passwordInput.type='password';
    passStatus.className ='far fa-eye-slash';
  }
}

function submitForm() {
  validateEmail();
  validatePassword();

  if (!loginErrors) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process-login-form.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`email=${email.value}&password=${password.value}`);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        console.log(xhr.responseText)
        var responseJSON = JSON.parse(xhr.responseText);
        if (responseJSON["success"] == "true") {
            window.location.href = "/RateFlix/home.php";
        } 
      }
    };

  }
}

function validateEmail() {

  var message = '';
  if (email.value == null || email.value.length === 0) {
    message = 'Please enter an email address';
  } else if (email.value.indexOf('@') === -1) {
    message = 'Your email format is not valid';
  }

  var emailErrorContainer = document.querySelector('#emailError') || document.createElement('P');

  if (message) {
    emailErrorContainer.innerHTML = `<i class="fas fa-exclamation-circle"></i><span class="error-message">${message}</span>`;
    emailErrorContainer.setAttribute('class', 'error-container');
    emailErrorContainer.setAttribute('id', 'emailError');

    email.parentNode.insertBefore(emailErrorContainer, email.nextSibling);
    loginErrors = true;
  } else {
    emailErrorContainer.remove();
    loginErrors = false;
  }

}

function validatePassword() {

  var message = '';
  if (password.value == null || password.value.length === 0) {
    message = 'Please enter your password';
  } else if (password.value.length < 8) {
    message = 'Your password must be at least 8 characters';
  }

  var passwordErrorContainer = document.querySelector('#passwordError') || document.createElement('P');

  if (message) {
    passwordErrorContainer.innerHTML = `<i class="fas fa-exclamation-circle"></i><span class="error-message">${message}</span>`;
    passwordErrorContainer.setAttribute('class', 'error-container');
    passwordErrorContainer.setAttribute('id', 'passwordError');

    const passwordRow = document.getElementById('passwordRow');

    passwordRow.parentNode.insertBefore(passwordErrorContainer, passwordRow.nextSibling);
    loginErrors = true;
  } else {
    passwordErrorContainer.remove();
    loginErrors = false;
  }
}
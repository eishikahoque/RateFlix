document.getElementById('passwordStatus').addEventListener('click', function() {
  viewPassword('password');
}, false);
document.getElementById('repasswordStatus').addEventListener('click', function() {
  viewPassword('repassword');
}, false);

document.getElementById('submitBtn').addEventListener('click', submitForm);

var loginErrors = false;

function submitForm() {
  var firstName = validateName('first');
  var lastName = validateName('last');
  var email = validateEmail();
  var password = validatePassword('password');
  validatePassword('repassword');

  if (!loginErrors) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process-signup-form.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`firstName=${firstName}&lastName=${lastName}&email=${email}&password=${password}`);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        console.log(xhr.responseText);
        var responseJSON = JSON.parse(xhr.responseText);
        if (responseJSON["success"] === "true") {
            window.location.href = "/RateFlix/setup-genre.php";
        }
      }
    };

  }
}

function viewPassword(id) {
  var passwordInput = document.getElementById(`${id}Field`);
  var passStatus = document.getElementById(`${id}Status`);

  if (passwordInput.type == "password") {
    passwordInput.type="text";
    passStatus.className= "far fa-eye";
  } else if (passwordInput.type == "text") {
    passwordInput.type="password";
    passStatus.className ="far fa-eye-slash";
  }
}

function validateName(id) {
  var name = document.getElementById(`${id}Name`);
  var message = '';
  if (name.value == null || name.value.length === 0) {
    message = `Please enter your ${id} name`;
  }

  var nameErrorContainer = document.querySelector(`#${id}Error`) || document.createElement('P');

  if (message) {
    nameErrorContainer.innerHTML = `<i class="fas fa-exclamation-circle"></i><span class="error-message">${message}</span>`;
    nameErrorContainer.setAttribute('class', 'error-container');
    nameErrorContainer.setAttribute('id', `${id}Error`);

    name.parentNode.insertBefore(nameErrorContainer, name.nextSibling);
    loginErrors = true;
  } else {
    nameErrorContainer.remove();
    loginErrors = false;
  }
  return name.value;
}

function validateEmail() {

  var email = document.getElementById('email');
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
  return email.value;
}

function validatePassword(id) {

  var password = document.getElementById(`${id}Field`);
  var message = '';
  if (password.value == null || password.value.length === 0) {
    message = 'Please enter your password';
  } else if (password.value.length < 8) {
    message = 'Your password must be at least 8 characters';
  } else if (id === 'repassword' && password.value !== document.getElementById('passwordField').value) {
    message = 'Your passwords must match';
  }

  var passwordErrorContainer = document.querySelector(`#${id}Error`) || document.createElement('P');

  if (message) {
    passwordErrorContainer.innerHTML = `<i class="fas fa-exclamation-circle"></i><span class="error-message">${message}</span>`;
    passwordErrorContainer.setAttribute('class', 'error-container');
    passwordErrorContainer.setAttribute('id', `${id}Error`);

    const passwordRow = document.getElementById(`${id}Row`);

    passwordRow.parentNode.insertBefore(passwordErrorContainer, passwordRow.nextSibling);
    loginErrors = true;
  } else {
    passwordErrorContainer.remove();
    loginErrors = false;
  }
  return password.value;
}
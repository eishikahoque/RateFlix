
document.getElementById('rateBtn').addEventListener('click', function(event) {
  event.preventDefault();
  submitRating();
}, false);

document.getElementById('submitReview').addEventListener('click', function(event) {
  event.preventDefault();
  submitReview();
}, false);

var modal = document.getElementById("myModal");

document.getElementById('addToListbtn').addEventListener('click', function(event) {
  event.preventDefault();
  modal.style.display = "block";
}, false);

document.addEventListener("DOMContentLoaded", function() {
  var currentReview = reviewSection.value;
  if (currentReview.length > 300) {
    currentReview = currentReview.substr(0, 300);
  }
  characterCount.innerText = currentReview.length;

  var currentRating = document.forms[1]['currentRating'].value;
  document.forms[1]['myrating'].value = currentRating;
}, false);

var reviewSection = document.getElementById('myReview');
reviewSection.addEventListener('input', function(event) {
  updateCharacterCount(event);
});

var characterCount = document.getElementById('characterCount');

function submitRating() {
  var rating = document.forms[1]['myrating'].value;
  if (rating) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process-movie-rating.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`rating=${rating}&movieID=${document.forms[1]['movieID'].value}&userID=${document.forms[1]['userID'].value}`);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        console.log(xhr.responseText);
        var responseJSON = JSON.parse(xhr.responseText);
        if (responseJSON["success"] === "true") {
            window.location.reload();
        }
      }
    };
  }
}

function updateCharacterCount(event) {
  var currentValue = event.target.value;
  var currentLength = currentValue.length;

  if (currentLength > 300) {
    reviewSection.value = currentValue.substr(0, 300);
    return false;
  }
  characterCount.innerText = currentLength;
}

function submitReview() {
  var review = reviewSection.value;
  if (review) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process-movie-review.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`review=${review}&movieID=${document.forms[1]['movieID'].value}&userID=${document.forms[1]['userID'].value}`);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        console.log(xhr.responseText);
        var responseJSON = JSON.parse(xhr.responseText);
        if (responseJSON["success"] === "true") {
            window.location.reload();
        }
      }
    };
  }
}
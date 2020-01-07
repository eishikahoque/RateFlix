
document.getElementById('rateBtn').addEventListener('click', function(event) {
  event.preventDefault();
  submitRating();
}, false);

document.getElementById('submitReview').addEventListener('click', function(event) {
  event.preventDefault();
  submitReview();
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
    xhr.open('POST', 'process-rating.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`rating=${rating}&tvshowID=${document.forms[1]['tvshowID'].value}&userID=${document.forms[1]['userID'].value}`);

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
    xhr.open('POST', 'process-review.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`review=${review}&tvshowID=${document.forms[1]['tvshowID'].value}&userID=${document.forms[1]['userID'].value}`);

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

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

document.addEventListener("DOMContentLoaded", function() {
  var currentReview = reviewSection.value;
  if (currentReview.length > 300) {
    currentReview = currentReview.substr(0, 300);
  }
  characterCount.innerText = currentReview.length;

  var currentRating = document.forms[1]['currentRating'].value;
  document.forms[1]['myrating'].value = currentRating;
}, false);


var modal = document.getElementById("myModal");
document.getElementById('addToListBtn').addEventListener('click', function(event) {
  event.preventDefault();
  modal.style.display = "block";
}, false);

document.getElementById('modalCloseBtn').addEventListener('click', function(event) {
  event.preventDefault();
  modal.style.display = "none";
}, false);

var existingListBtns = document.querySelectorAll('.existingListBtn');
for (var i = 0; i < existingListBtns.length; i++) {
  existingListBtns[i].addEventListener('click', function(event) {
    event.preventDefault();
    addToExistingList(event);
  }, false);
}

function addToExistingList(event) {
  var listID = event.target.id;

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'lists-process-create.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  xhr.send(`listID=${listID}&tvshowID=${document.forms[1]['tvshowID'].value}`);

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

document.getElementById('createListBtn').addEventListener('click', function(event) {
  event.preventDefault();
  addToNewList();
}, false);

function addToNewList() {
  var listName = document.getElementById('listName').value;
  if (listName) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'lists-process-create.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.send(`listName=${listName}&tvshowID=${document.forms[1]['tvshowID'].value}`);

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

//submitting rating

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

//Character count

var characterCount = document.getElementById('characterCount');
function updateCharacterCount(event) {
  var currentValue = event.target.value;
  var currentLength = currentValue.length;

  if (currentLength > 300) {
    reviewSection.value = currentValue.substr(0, 300);
    return false;
  }
  characterCount.innerText = currentLength;
}

//submitting review

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
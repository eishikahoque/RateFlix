var listNameInputs = document.querySelectorAll('#listTextInput');
for (var i = 0; i < listNameInputs.length; i++) {
  listNameInputs[i].addEventListener('blur', function(event) {
    editListName(event);
  });
}

function editListName(event) {
	var listName = event.target.value;
	if (listName.length > 0) {
		var listID = event.target.parentElement.id;
		var xhr = new XMLHttpRequest();
	    xhr.open('POST', 'lists-process-edit.php', true);
	    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	    xhr.send(`listName=${listName}&listID=${listID}`);
	}
}
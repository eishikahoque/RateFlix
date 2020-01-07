//Count & limit characters



function characterCount() {
	var myText = document.getElementById('myReview');
	var count = document.getElementById('characterCount');
	var characters = myText.value.split('');
	count.innerText = characters.length;
};

//submit reviews
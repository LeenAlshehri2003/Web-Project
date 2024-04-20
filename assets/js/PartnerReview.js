// script.js

// To access the stars
let stars = 
	document.getElementsByClassName("star");
let output = 
	document.getElementById("output");

// function to update rating
function gfg(n) {
	remove();
	for (let i = 0; i < n; i++) {
		if (n == 1) cls = "one";
		else if (n == 2) cls = "two";
		else if (n == 3) cls = "three";
		else if (n == 4) cls = "four";
		else if (n == 5) cls = "five";
		stars[i].className = "star " + cls;
	}
	output.innerText = "Rating is: " + n + "/5";
	document.getElementById('rating').value = n;
}

// To remove the pre-applied styling
function remove() {
	let i = 0;
	while (i < 5) {
		stars[i].className = "star";
		i++;
	}
}

$(document).ready(function() {
	$('#reviewsubmit').on('submit', function(e) {
	  e.preventDefault();
  
	  $.ajax({
		url: '../php/Partner_Review.php',
		type: 'POST',
		data: formData,
		success: function(response) {
		  alert('review submitted successfully.');
		  // Optionally redirect or update the UI
		},
		error: function() {
		  alert('Error submitting review.');
		}
	  });
	});
  });


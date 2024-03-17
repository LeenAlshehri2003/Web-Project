/*window.onload = function() {
  // Load the profile information from localStorage
  var first = localStorage.getItem('EditedFirst');
  var last = localStorage.getItem('EditedLast');
  var City = localStorage.getItem('EditedCity');
  
  // Update the profile section
  document.getElementById('displayFirst').textContent =  (first ? first : 'Not set');
  document.getElementById('displayLast').textContent = (last ? last : 'Not set');
  document.getElementById('displayCity').textContent = (City ? City : 'Not set');
}
*/
window.onload = function() {
  if(localStorage.getItem('EditedFirst')) {
      document.getElementById('displayFirst').textContent = localStorage.getItem('EditedFirst');
  }
  if(localStorage.getItem('EditedLast')) {
      document.getElementById('displayLast').textContent = localStorage.getItem('EditedLast');
  }
  if(localStorage.getItem('EditedCity')) {
    document.getElementById('displayCity').textContent = localStorage.getItem('EditedCity');
}
       
      if(localStorage.getItem('address')) {
          document.getElementById('DisplayAddress').textContent = localStorage.getItem('address');
      } 
     
      var imageData = localStorage.getItem('profilePic');
      if (imageData) {
          var profilePictureElement = document.getElementById('profilePicture');
          if (profilePictureElement) {
              profilePictureElement.src = imageData;
          } else {
              console.error('Profile picture element not found.');
          }
      } else {
          console.error('No image data found in localStorage.');
      }

    }
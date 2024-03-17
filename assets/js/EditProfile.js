function updateProfile() {
  // Get the value from the input field
  var First = document.getElementById("FirstName").value;
  var Last = document.getElementById("LastName").value;
  var City = document.getElementById("City").value;
  var Password = document.getElementById("password").value;

  // Set the profile display to the new values
 
  localStorage.setItem('EditedFirst', First);
  localStorage.setItem('EditedLast', Last);
  localStorage.setItem('EditedCity', City);
  localStorage.setItem('EditedPassword', Password);

        
        // Redirect to profile page
        window.location.href = '../HTML pages/Profile Page-Language Learner.html';
}

function uploadAndPreviewImage() {
  var file = document.getElementById('imageInput').files[0];
  var reader = new FileReader();
  
  reader.onloadend = function() {
      // Display the selected image as a preview
      document.getElementById('profilePicPreview').src = reader.result;
      
      // Save the Base64 image data to localStorage for later retrieval
      localStorage.setItem('profilePic', reader.result);
  }
  
  if (file) {
      // Read the image file as a Data URL (Base64 encoded)
      reader.readAsDataURL(file);
  } else {
      document.getElementById('profilePicPreview').src = "";
  }
}
function previewFile() {
  var preview = document.getElementById('profile-image1');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
  reader.onloadend = function () {
    preview.src = reader.result;
    // Save the Base64 image data to localStorage
    localStorage.setItem('profilePic', reader.result);
};
}
                      $(function() {
            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });
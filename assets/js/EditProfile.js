document.addEventListener("DOMContentLoaded", function() {
  // Assuming your form has a class or unique identifier, if not, consider adding one
  // For demonstration, using document.querySelector('form') directly
  var form = document.querySelector('form');

  form.onsubmit = function(event) {
      // Prevent the default form submission
      event.preventDefault();

      // Perform your validation checks
      if (updateProfile()) {
          // If updateProfile() returns true (i.e., all fields are valid), redirect to the success page
          window.location.href = 'Success Message-Language Learner.html';
      } else {
          // If validation fails, the function already handles displaying errors
          // No action required here unless you want to provide additional feedback
      }
  };
});

function updateProfile() {
  var First = document.getElementById("FirstName");
  var Last = document.getElementById("LastName");
  var City = document.getElementById("City");
  var CurrentPass = document.getElementById("CurrentPass");
  var NewPass = document.getElementById("NewPass");
  var ConfirmPass = document.getElementById("password");

  var allFieldsFilled = true;

  // Helper function for checking and styling fields
  function checkAndStyleField(field) {
      if (!field.value.trim()) {
          field.style.border = '2px solid red';
          allFieldsFilled = false;
      } else {
          field.style.border = '';
      }
  }

  // Check and style individual fields
  [First, Last, City, CurrentPass, NewPass, ConfirmPass].forEach(checkAndStyleField);

  // Additional check for New Password and Confirm Password match
  if (NewPass.value.trim() && ConfirmPass.value.trim() && NewPass.value !== ConfirmPass.value) {
      NewPass.style.border = '2px solid red';
      ConfirmPass.style.border = '2px solid red';
      // Alert tied to the input box by highlighting them in red and showing an alert
      alert('New Password and Confirm Password do not match. Please enter matching passwords.');
      return false; // Return early since the passwords do not match
  }

  // Proceed if all fields are filled and passwords match
  if (allFieldsFilled) {
      // Process form data here, e.g., saving data to localStorage
      localStorage.setItem('EditedFirst', First.value);
      localStorage.setItem('EditedLast', Last.value);
      localStorage.setItem('EditedCity', City.value);
      localStorage.setItem('EditedCurrentPass', CurrentPass.value);
      localStorage.setItem('EditedNewPass', NewPass.value);
      // Assuming successful update
      return true;
  }

  // If we reach here, it means not all fields were properly filled
  return false;
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

      
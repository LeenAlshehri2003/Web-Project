document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector("form");
  const fileInput = document.getElementById('profile-image-upload');
  const profileImage = document.getElementById('profile-image1');

  // Trigger file input when 'Change Photo' button is clicked
  document.getElementById('changePhoto').addEventListener('click', function() {
      fileInput.click();
  });

  // Preview the selected image
  fileInput.addEventListener('change', function() {
      previewFile();
  });

  // Validate form fields before submitting
  form.addEventListener("submit", function(e) {
      let isValid = true;
      const requiredFields = ['FirstName', 'LastName', 'PhoneNumber', 'City', 'About', 'CurrentPass', 'NewPass', 'ConfirmPass'];

      requiredFields.forEach(fieldName => {
          const input = document.querySelector(`[name='${fieldName}']`);
          if (!input.value.trim()) {
              input.style.border = '2px solid red';
              isValid = false;
          } else {
              input.style.border = '';
          }
      });

      // Check if new password and confirm password match
      const newPassword = document.querySelector("[name='NewPass']").value;
      const confirmPassword = document.querySelector("[name='ConfirmPass']").value;
      if (newPassword !== confirmPassword) {
          alert("New Password and Confirm Password do not match.");
          document.querySelector("[name='NewPass']").style.border = '2px solid red';
          document.querySelector("[name='ConfirmPass']").style.border = '2px solid red';
          isValid = false;
      }

      if (!isValid) {
          e.preventDefault(); // Prevent form submission
      }
  });
});

function previewFile() {
  const preview = document.getElementById('profile-image1');
  const file = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.onloadend = function() {
      preview.src = reader.result;
  };

  if (file) {
      reader.readAsDataURL(file);
  } else {
      preview.src = "";
  }
}

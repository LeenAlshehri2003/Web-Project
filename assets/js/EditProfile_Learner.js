document.addEventListener("DOMContentLoaded", function() {
    // Bind the form submission event
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        const newPasswordField = document.getElementById('NewPass');
        const confirmPasswordField = document.getElementById('password');
        const passwordHint = document.getElementById('passwordHint');
        const confirmPasswordHint = document.getElementById('confirmPasswordHint');
      
        // Event listeners for password fields to show and hide hints
        newPasswordField.addEventListener("focus", function() {
          passwordHint.style.display = "inline";
        });
        newPasswordField.addEventListener("blur", function() {
          passwordHint.style.display = "none";
        });
        confirmPasswordField.addEventListener("focus", function() {
          confirmPasswordHint.style.display = "inline";
        });
        confirmPasswordField.addEventListener("blur", function() {
          confirmPasswordHint.style.display = "none";
        });
      
        if (validateForm()) {
            form.submit(); // Submit the form if validation passes
        }
    });
});

function validateForm() {
    let isValid = true; // Assume form is valid initially

    // List of all fields to validate
    const fieldsToValidate = [document.getElementById("FirstName"), document.getElementById("LastName"), document.getElementById("City"), document.getElementById("CurrentPass"), document.getElementById("NewPass"), document.getElementById("password")];
    const newPassword = document.getElementById("NewPass").value.trim();
    const confirmPassword = document.getElementById("password").value.trim();

    // Function to check and style each field
fieldsToValidate.forEach(field => {
    if (!field.value.trim()) {
        field.style.border = '2px solid red'; // Highlight empty fields
        isValid = false;
    } else {
        field.style.border = ''; // Reset if filled
    }
});

// Password length and special character validation
if (newPassword && (newPassword.length < 8 || !/[!@#$%^&*(),.?":{}|<>]/.test(newPassword))) {
    document.getElementById("NewPass").style.border = '2px solid red';
    Swal.fire({
        title: 'LinguaLink',
        text: 'Password must be at least 8 characters long and include at least one special character.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
    isValid = false;
}

// Check if new passwords match
if (newPassword && confirmPassword && newPassword !== confirmPassword) {
    document.getElementById("NewPass").style.border = '2px solid red';
    document.getElementById("password").style.border = '2px solid red';
    Swal.fire({
        title: 'LinguaLink',
        text: 'New Password and Confirm Password do not match. Please enter matching passwords.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
    isValid = false;
}

// Use SweetAlert to inform user of form validity issues if there are any
if (!isValid) {
    Swal.fire({
        title: 'LinguaLink',
        text: 'Please check the form for errors.',
        icon: 'error',
        confirmButtonColor: '#FFA500',  
        confirmButtonText: 'OK'
    });
    event.preventDefault(); // Prevent form submission
}

// Return the overall form validity
return isValid;
}

function previewFile() {
    const preview = document.getElementById('profile-image1');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result; // Set the preview image source
    };

    if (file) {
        reader.readAsDataURL(file); // Convert image to Base64 URL
    } else {
        preview.src = ""; // Reset preview if no file is selected
    }
}

// Trigger file input when image is clicked
$(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});
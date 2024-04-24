document.addEventListener("DOMContentLoaded", function() {
    // Bind the form submission event
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

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

    // Check if new passwords match, only if they are provided
    if (newPassword && confirmPassword && newPassword !== confirmPassword) {
        document.getElementById("NewPass").style.border = '2px solid red';
        document.getElementById("password").style.border = '2px solid red';
        alert('New Password and Confirm Password do not match. Please enter matching passwords.');
        isValid = false; // Invalidate form due to mismatch
    }
    if (!isValid) {
        Swal.fire({
            title: 'LinguaLink',
            text: 'Please fill all required fields',
            icon: 'info',
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
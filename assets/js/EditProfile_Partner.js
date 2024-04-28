document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('PartnerForm');
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
    const fieldsToValidate = [
        document.getElementById("FirstName"), 
        document.getElementById("LastName"), 
        document.getElementById("Phone"), 
        document.getElementById("City"), 
        document.getElementById("Bio"), 
        document.getElementById("Age")
    ];

    // Password fields for validation
    const newPassword = document.getElementById("NewPassPartner").value.trim();
    const confirmPassword = document.getElementById("ConfirmPassPartner").value.trim();

    // Function to check and style each field
    fieldsToValidate.forEach(field => {
        if (!field || field.value.trim() === '') {
            field.style.border = '2px solid red'; // Highlight empty fields
            isValid = false;
        } else {
            field.style.border = ''; // Reset if filled
        }
    });

    // Validate language checkboxes
    const languageCheckboxes = document.querySelectorAll("[name='languages[]']");
    const isLanguageSelected = Array.from(languageCheckboxes).some(checkbox => checkbox.checked);
    if (!isLanguageSelected) {
        languageCheckboxes.forEach(checkbox => checkbox.nextElementSibling.style.color = 'red');
        alert('Please select at least one language.');
        isValid = false;
    } else {
        languageCheckboxes.forEach(checkbox => checkbox.nextElementSibling.style.color = '');
    }

    // Password validation
    if (newPassword && (newPassword.length < 8 || !/[!@#$%^&*(),.?":{}|<>]/.test(newPassword))) {
        document.getElementById("NewPassPartner").style.border = '2px solid red';
        alert('Password must be at least 8 characters long and include at least one special character.');
        isValid = false;
    }

    // Check if new passwords match
    if (newPassword && confirmPassword && newPassword !== confirmPassword) {
        document.getElementById("NewPassPartner").style.border = '2px solid red';
        document.getElementById("ConfirmPassPartner").style.border = '2px solid red';
        alert('New Password and Confirm Password do not match. Please enter matching passwords.');
        isValid = false;
    }

    // Return the overall form validity
    return isValid;
}

function previewFile() {
    const preview = document.getElementById('profile-image1');
    const file = document.getElementById('profile-image-upload').files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result; // Set the preview image source
    };

    if (file) {
        reader.readAsDataURL(file); // Convert image to Base64 URL
    } else {
        preview.src = "https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png"; // Default or placeholder image
    }
}

// Trigger file input when image is clicked
document.getElementById('profile-image1').addEventListener('click', function() {
    document.getElementById('profile-image-upload').click();
});
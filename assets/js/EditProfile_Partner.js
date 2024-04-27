document.addEventListener("DOMContentLoaded", function() {
    const profileImage = document.getElementById('profile-image1');
    const fileInput = document.getElementById('profile-image-upload');

    fileInput.addEventListener('change', previewFile);

    const form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        console.log("Form submit attempt.");
        if (!validateForm()) {
            console.log("Validation failed.");
            e.preventDefault(); // Prevent form submission if validation fails
        } else {
            console.log("Validation passed.");
        }
    });

    function previewFile() {
        var file = fileInput.files[0];
        var profileImage = document.getElementById('profile-image1');
    
        if (file) {
            const reader = new FileReader();
            reader.onloadend = function() {
                profileImage.src = reader.result;
            };
            reader.readAsDataURL(file);
        } else {
            profileImage.src = "https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png"; // Default or placeholder image
        }
    }

    function validateForm() {
        let isValid = true;
    
        // Define the elements to validate
        const elementsToValidate = [
            {  name: "FirstName" },
            {  name: "LastName" },
            { name: "Phone" },
            {  name: "City" },
            { id: "Bio", name: "Bio" },
            {  name: "Age" },
            { id: "CurrentPassPartner", name: "CurrentPass" },
            { id: "NewPassPartner", name: "NewPass" },
            { id: "ConfirmPassPartner", name: "ConfirmPass" },
            { id: "Gender", name: "Gender" },
            { id: "SessionPrice", name: "Session Price" }
        ];
    
        // Check if all required fields are filled and valid
        elementsToValidate.forEach(elem => {
            const input = document.getElementById(elem.name);
            if (!input || input.value.trim() === '') {
                input.style.border = '2px solid red';
                console.log(elem.name + " is invalid.");
                isValid = false;
            } else {
                input.style.border = '';
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
    
        // Validate new and confirm password fields
        const newPassword = document.getElementById("NewPassPartner").value.trim();
        const confirmPassword = document.getElementById("ConfirmPass").value.trim();
        if (newPassword && confirmPassword && newPassword !== confirmPassword) {
            document.getElementById("NewPassPartner").style.border = '2px solid red';
            document.getElementById("ConfirmPass").style.border = '2px solid red';
            alert('New Password and Confirm Password do not match.');
            isValid = false;
        }
    
        // Validate new password requirements
        const passwordErrorMessage = validatePassword(newPassword);
        if (passwordErrorMessage !== "") {
            alert(passwordErrorMessage);
            document.getElementById("NewPassPartner").style.border = '2px solid red';
            isValid = false;
        }
    
        return isValid;
    }
    
    function validatePassword(password) {
        if (password.length < 8) {
            return "Password must be at least 8 characters long.";
        }
        if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            return "Password must contain at least one special character.";
        }
        return "";
    }
});
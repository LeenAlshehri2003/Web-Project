document.addEventListener("DOMContentLoaded", function() {
    const profileImage = document.getElementById('profile-image1');
    const fileInput = document.getElementById('profile-image-upload');

    fileInput.addEventListener('change', previewFile);

    const form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        if (!validateForm()) {
            e.preventDefault(); // Prevent form submission if validation fails
        }
    });

    function previewFile() {
        const file = fileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onloadend = function() {
                profileImage.src = reader.result;
            };
            reader.readAsDataURL(file);
        } else {
            profileImage.src = ""; // Clear the preview
        }
    }

    function validateForm() {
        let isValid = true;
        const formElements = [
            { selector: "First name" },
            { selector: "Last Name" },
            { selector: "Phone Number" },
            { selector: "City" },
            { selector: "About" },
            { selector: "CurrentPass" },
            { selector: "NewPass" },
            { selector: "ConfirmPass" },
            { selector: "Gender" }, // Assuming the Gender field is a dropdown that must not be empty
          
        ];
    
        formElements.forEach(elem => {
            const input = document.querySelector(`[name='${elem.selector}']`);
            const value = input ? input.value.trim() : '';
            if (!value) {
                input.style.border = '2px solid red';
                isValid = false;
            } else {
                input.style.border = '';
            }
        });
    
        // Check if new passwords match, only if they are provided
        const newPassword = document.querySelector("[name='NewPass']").value.trim();
        const confirmPassword = document.querySelector("[name='ConfirmPass']").value.trim();
        if (newPassword && confirmPassword && newPassword !== confirmPassword) {
            document.querySelector("[name='NewPass']").style.border = '2px solid red';
            document.querySelector("[name='ConfirmPass']").style.border = '2px solid red';
            alert('New Password and Confirm Password do not match. Please enter matching passwords.');
            isValid = false; // Invalidate form due to mismatch
        }
    
        if (!isValid) {
            alert("Please fill in all fields highlighted in red.");
        }
    
        return isValid;
    }
});
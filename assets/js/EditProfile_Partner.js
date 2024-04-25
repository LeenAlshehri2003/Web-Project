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
        var fileInput = document.getElementById('profile-image-upload');
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
        const formElements = [
            { selector: "FirstName" },
            { selector: "LastName" },
            { selector: "Phone" },
            { selector: "City" },
            { selector: "Bio" },
            { selector: "CurrentPass" },
            { selector: "NewPass" },
            { selector: "ConfirmPass" },
            { selector: "Gender" },
            { selector: "SessionPrice" },

        ];

        formElements.forEach(elem => {
            const input = document.querySelector(`[name='${elem.selector}']`);
            if (!input || input.value.trim() === '') {
                if (input) input.style.border = '2px solid red';
                console.log(elem.selector + " is invalid.");
                isValid = false;
            } else {
                input.style.border = '';
            }
        });

         // Add validation for language checkboxes
    const languageCheckboxes = document.querySelectorAll("[name='languages[]']");
    const isLanguageSelected = Array.from(languageCheckboxes).some(checkbox => checkbox.checked);
    if (!isLanguageSelected) {
        // If no checkboxes are selected, mark as invalid and alert the user
        languageCheckboxes.forEach(checkbox => checkbox.nextElementSibling.style.color = 'red');
        alert('Please select at least one language.');
        isValid = false;
    } else {
        languageCheckboxes.forEach(checkbox => checkbox.nextElementSibling.style.color = '');
    }

        const newPassword = document.querySelector("[name='NewPass']").value.trim();
        const confirmPassword = document.querySelector("[name='ConfirmPass']").value.trim();
        if (newPassword && confirmPassword && newPassword !== confirmPassword) {
            document.querySelector("[name='NewPass']").style.border = '2px solid red';
            document.querySelector("[name='ConfirmPass']").style.border = '2px solid red';
            alert('New Password and Confirm Password do not match.');
            isValid = false;
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

        return isValid;
    }
});
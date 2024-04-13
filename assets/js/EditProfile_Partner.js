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
            { selector: "First name", message: "First name is required." },
            { selector: "Last Name", message: "Last name is required." },
            { selector: "Phone Number", message: "Phone number is required." },
            { selector: "City", message: "City is required." },
            { selector: "About", message: "About is required." },
            { selector: "CurrentPass", message: "Current password is required." },
            { selector: "NewPass", message: "New password is required." },
            { selector: "ConfirmPass", message: "Confirm password is required." }
        ];

        formElements.forEach(elem => {
            const input = document.querySelector(`[name='${elem.selector}']`);
            const value = input ? input.value.trim() : '';
            if (!value) {
                input.style.border = '2px solid red';
                alert(elem.message);
                isValid = false;
            } else {
                input.style.border = '';
            }
        });

        const newPass = document.querySelector("[name='NewPass']").value.trim();
        const confirmPass = document.querySelector("[name='ConfirmPass']").value.trim();
        if (newPass && confirmPass && newPass !== confirmPass) {
            alert("New Password and Confirm Password do not match.");
            document.querySelector("[name='NewPass']").style.border = '2px solid red';
            document.querySelector("[name='ConfirmPass']").style.border = '2px solid red';
            isValid = false;
        }

        return isValid;
    }
});
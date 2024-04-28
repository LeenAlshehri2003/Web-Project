
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
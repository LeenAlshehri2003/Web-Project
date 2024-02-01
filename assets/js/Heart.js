 document.addEventListener('DOMContentLoaded', function () {
        // Get all heart icons
        var heartIcons = document.querySelectorAll('.heart-icon');

        // Add click event listener to each heart icon
        heartIcons.forEach(function (heartIcon) {
            heartIcon.addEventListener('click', function () {
                // Toggle the 'active' class to change the color and indicate if it's a favorite
                heartIcon.classList.toggle('active');
            });
        });
    });
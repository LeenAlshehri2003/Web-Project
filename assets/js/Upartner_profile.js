document.addEventListener("DOMContentLoaded", function() {
    // Get the partner ID from the URL query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const partnerId = urlParams.get('partnerId');

    // Make an AJAX request to fetch partner data
    fetchPartnerData(partnerId);
});

function fetchPartnerData(partnerId) {
    // Make an AJAX request to the PHP script with the partner ID as a query parameter
    fetch(`http://localhost/Web-Project/assets/php/Upartner_profile.php?partnerId=${partnerId}`)
    .then(response => {
        // Check if the response is successful (status code 200)
        if (response.ok) {
            return response.json(); // Parse the JSON response
        } else {
            throw new Error('Failed to fetch partner data');
        }
    })
    .then(partnerData => {
        // Call a function to display the partner data on the profile page
        displayPartnerData(partnerData);
    })
    .catch(error => {
        console.error(error); // Log any errors to the console
    });
}

function displayPartnerData(partnerData) {
    // Get the profile container element
    const profileContainer = document.getElementById('partner-profile');

    // Check if the profile container element exists
    if (profileContainer) {
        // Generate the HTML content with the partner data
        const profileHTML = `
            <div class="z-gallery mb-30">
                <div class="z-gallery__thumb mb-20">
                    <img class="img-fluid" src="${partnerData.Photo}" alt="Partner Profile picture" width="300" height="300">
                </div>
                <div class="z-gallery__content">
                    <div class="instructor-profile">
                        <h2>Partner Profile</h2>
                        <ul class="profile-list mb-50">
                            <li> First Name : <span>${partnerData.FirstName}</span></li>
                            <li> Last Name : <span>${partnerData.LastName}</span></li>
                            <li>Age : <span>${partnerData.Age}</span></li>
                            <li>Gender : <span>${partnerData.Gender}</span></li>
                            <li>Email : <span>${partnerData.Email}</span></li>
                            <li>Mobile Num: <span>${partnerData.Mobile}</span></li>
                            <li>City : <span>${partnerData.City}</span></li>
                            <li>Languages spoken: <span>${partnerData.Languages}</span></li>
                            <li>session price: <span>${partnerData.SessionPrice}$/hour</span></li>
                        </ul>
                        <div class="social-media">
                        <a href="${partnerData.Facebook}"><i class="fab fa-facebook-f"></i></a>
                        <a href="${partnerData.Twitter}"><i class="fab fa-twitter"></i></a>
                        <a href="${partnerData.Instagram}"><i class="fab fa-instagram"></i></a>
                        <a href="${partnerData.Youtube}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="z-gallery__content">
                    <div class="instructor-profile">
                        <h2>Instructor Bio</h2>
                        <div class="star-icon mb-20">
                            ${generateStarIcons(partnerData.Rating)} <!-- Function to generate star icons -->
                        </div>
                        <p class="mb-25">${partnerData.Bio}</p>
                        <div class="info-container" style="display: flex; align-items: center; justify-content: space-between;">
                            <h5 class="total-stu pt-30"><span><img src="../assets/img/icon/avatar-outline-badged-2.svg" alt="icon"> ${partnerData.TotalStudents}+ Students</span></h5>
                            <ul>
                                <li><a href="../HTML pages/View Reviews and Rates (F) - Learner.html" class="theme_btn free_btn">Rates and Reviews</a></li>
                                <li><a href="mailto:${partnerData.Email}" class="theme_btn free_btn">Arrange new meeting</a></li>
                                <li><a href="Post Request.html" class="theme_btn free_btn">Post Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Replace the content of the profile container with the generated HTML
        profileContainer.innerHTML = profileHTML;
    } else {
        console.error("Profile container not found.");
    }
}

function generateStarIcons(rating) {
    // Calculate the number of full stars
    const fullStars = Math.floor(rating);
    // Calculate the number of half stars
    const halfStars = Math.ceil(rating - fullStars);

    // Generate the HTML for full stars
    const fullStarsHTML = '<a href="#"><i class="fas fa-star"></i></a>'.repeat(fullStars);
    // Generate the HTML for half stars
    const halfStarsHTML = '<a href="#"><i class="fas fa-star-half-alt"></i></a>'.repeat(halfStars);
    
    // Return the combined HTML for full and half stars
    return fullStarsHTML + halfStarsHTML;
}

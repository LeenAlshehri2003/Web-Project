function fetchPartnerDataFromUrl() {
    // Extract partner ID from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const partnerId = urlParams.get('partnerId');

    if (partnerId) {
        fetch(`http://localhost/Web-Project/assets/php/Upartner_profile.php?partnerId=${partnerId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Fetched partner data:', data); // Log the fetched data
            // Call the displayPartnerData function with the retrieved data
            displayPartnerData(data.partnerData);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    } else {
        console.error('Partner ID not found in the URL.');
    }
}

function displayPartnerData(partnerData) {
    // Get the partners container element
    const partnersContainer = document.getElementById('partners-container');

    // Check if the partners container element exists
    if (partnersContainer) {
        // Create a div element for the partner profile
        const partnerProfile = document.createElement('div');
        partnerProfile.classList.add('partner-profile');
        const filledStars = Math.round(parseFloat(partnerData.AverageRating));

        // Construct the HTML content for the star icons
        let starIconsHTML = '<div class="star-icon mb-20">';
        for (let i = 0; i < filledStars; i++) {
            starIconsHTML += `<a href="#"><i class="fas fa-star"></i></a>`;
        }
        starIconsHTML += '</div>';

        // Construct the HTML content for the partner profile
        partnerProfile.innerHTML = `
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <img class="img-fluid" src="../assets/img/Partners images/${partnerData.Photo}" alt="Partner profile picture" width="300" height="300">
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="instructor-profile">
                    <h2>Partner Profile</h2>
                    <ul class="profile-list mb-50">
                        <li>First Name : <span>${partnerData.FirstName}</span></li>
                        <li>Last Name : <span>${partnerData.LastName}</span></li>
                        <li>Age : <span>${partnerData.Age}</span></li>
                        <li>Gender : <span>${partnerData.Gender}</span></li>
                        <li>Email : <span>${partnerData.Email}</span></li>
                        <li>Mobile Num: <span>${partnerData.Phone}</span></li>
                        <li>City : <span>${partnerData.City}</span></li>
                        <li>Languages spoken: <span>${partnerData.Languages}</span></li>
                        <li>Session price: <span>${partnerData.SessionPrice}</span> $/hour</li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="instructor-profile">
                    <h2>Instructor Bio</h2>
                    <div class="star-icon mb-20">
                        ${starIconsHTML}
                    </div>
                    <p class="mb-25">${partnerData.Bio}</p>
                    <div class="info-container" style="display: flex; align-items: center; justify-content: space-between;">
                        <h5 class="total-stu pt-30"><span><img src="../assets/img/icon/avatar-outline-badged-2.svg" alt="icon"> ${partnerData.TotalReviews} Reviews</span></h5>
                        <ul>
                            <li><a href="http://localhost/Web-Project/HTML pages/View Reviews - Learner.php"?${partnerData.PartnerID}" class="theme_btn free_btn" style="text-align: center;">Rates and Reviews</a></li>
                            <li><a href="mailto:${partnerData.Email}" class="theme_btn free_btn" style="text-align: center;">Arrange new meeting</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        `;

        // Append the partner profile to the partners container
        partnersContainer.appendChild(partnerProfile);
    } else {
        console.error("Partners container not found.");
    }
}

// Fetch partner data from URL
fetchPartnerDataFromUrl();

$(document).ready(function () {
    // Add event listener to partner names
    $(document).on('click', '.partner-link', function(event) {
        event.preventDefault(); // Prevent default action (e.g., navigating to the href)

        // Get the partner ID from the data attribute
        var partnerID = $(this).data('partner-id');

        // Construct the URL for the partner profile page
        var profileURL = "http://localhost/Web-Project/HTML pages/Partner%20profile%20U.html?partnerId=" + partnerID;

        // Redirect the user to the partner profile page
        window.location.href = profileURL;
    });

    // Make an AJAX request to fetch partner data from the PHP script
    fetchPartnersData();

    // Add event listener to category buttons
    $('.gf_btn').click(function () {
        // Remove the 'active' class from all buttons
        $('.gf_btn').removeClass('active');
        
        // Add the 'active' class to the clicked button
        $(this).addClass('active');

        // Get the data-filter value from the clicked button
        var filterValue = $(this).data('filter');

        // Show only the elements with the selected category or show all if 'All' button is clicked
        $('.grid-item').hide();
        if (filterValue === '*') {
            $('.grid-item').show();
        } else {
            $(filterValue).show();
        }
    });
});

function fetchPartnersData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/Web-Project/assets/php/partners.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                var partners = response.partners; // Access the partners array within the response
                displayPartners(partners);
            } else {
                console.error("Failed to fetch partners: " + xhr.status);
            }
        }
    };
    xhr.send();
}

function displayPartners(partners) {
    var partnersContainer = document.getElementById("partners-container");

    if (partnersContainer) {
        if (partners.length > 0) {
            partners.forEach(function(partner) {
                var partnerDiv = document.createElement("div");
                var languageIDs = partner.LanguageID.split(","); // Split the comma-separated list of language IDs
                var languageClasses = getLanguageClasses(languageIDs); // Get language classes based on partner's language IDs
                partnerDiv.classList.add("col-lg-4", "col-md-6", "grid-item", ...languageClasses); // Add language classes
                partnerDiv.innerHTML = `
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="#"><img class="img-fluid" src="${partner.Photo}" alt="" width="50" height="50"></a>
                        <div class="feedback-tag">${partner.AverageRating}</div>
                        <div class="heart-icon"><i class="fas fa-heart"></i></div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            ${partner.Languages.split(', ').map(function(language) {
                                return `<span>${language}</span>`;
                            }).join('')}
                            <a class="f-right" href="#"><img src=<?php echo htmlspecialchars('../assets/img/Partners images/' .${partner.Photo}); ?>" width="85" height="85" alt="Partner picture"></a>
                        </div>
                        <h4 class="sub-title mb-20"><a class="partner-link" data-partner-id="${partner.PartnerID}" href="#">${partner.FullName}</a></h4>
                        <div class="course__meta">
                            <span>${partner.Bio}</span>
                        </div>
                        <br>
                        <h6>${partner.SessionPrice}$/hour</h6>
                    </div>
                </div>
            `;
                partnersContainer.appendChild(partnerDiv);
            });
        } else {
            partnersContainer.innerHTML = "<p>No partners available.</p>";
        }
    } else {
        console.error("Partners container not found.");
    }
}

function getLanguageClasses(languageIDs) {
    var languageClasses = [];
    languageIDs.forEach(function(languageID) {
        switch (languageID) {
            case "1":
                languageClasses.push("cat1"); // English
                break;
            case "2":
                languageClasses.push("cat2"); // Arabic
                break;
            case "3":
                languageClasses.push("cat3"); // French
                break;
            case "4":
                languageClasses.push("cat4"); // Spanish
                break;
            case "5":
                languageClasses.push("cat5"); // Italian
                break;
            case "6":
                languageClasses.push("cat6"); // Japanese
                break;
            case "7":
                languageClasses.push("cat7"); // Chinese
                break;
            // Add more cases for other languages as needed
            default:
                break;
        }
    });
    return languageClasses;
}

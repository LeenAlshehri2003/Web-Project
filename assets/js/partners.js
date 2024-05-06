$(document).ready(function () {
    // Add event listener to partner names
    $(document).on('click', '.partner-link', function(event) {
        event.preventDefault(); // Prevent default action (e.g., navigating to the href)

        // Get the partner ID from the data attribute
        var partnerID = $(this).data('partner-id');

        // Construct the URL for the partner profile page
        var profileURL = "http://localhost/Web-Project/HTML pages/Partner profile U.php?partnerId=" + partnerID;
        
        // Redirect the user to the partner profile page
        window.location.href = profileURL;
    });

    // Fetch partner data and display
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
    $.ajax({
        url: "http://localhost/Web-Project/assets/php/partners.php",
        type: "GET",
        dataType: "json",
        success: function(response) {
            var partners = response.partners; // Access the partners array within the response
            displayPartners(partners);
        },
        error: function(xhr, status, error) {
            console.error("Failed to fetch partners: " + error);
        }
    });
}

function displayPartners(partners) {
    var partnersContainer = $("#partners-container");

    if (partners.length > 0) {
        $.each(partners, function(index, partner) {
            var partnerDiv = $("<div>").addClass("col-lg-4 col-md-6 grid-item");
            var languageClasses = getLanguageClasses(partner.LanguageID.split(",")); // Get language classes based on partner's language IDs
            partnerDiv.addClass(languageClasses.join(" ")); // Add language classes
            partnerDiv.html(`
                <div class="z-gallery mb-30">
                    <div class="z-gallery__thumb mb-20">
                        <a href="#"><img class="img-fluid" src="../assets/img/Partners images/${partner.Photo}" alt="" width="500" height="500"></a>
                        <div class="feedback-tag">${partner.AverageRating}</div>
                    </div>
                    <div class="z-gallery__content">
                        <div class="course__tag mb-15">
                            ${partner.Languages.split(', ').map(function(language) {
                                return `<span>${language}</span>`;
                            }).join('')}
                            <a class="f-right" href="#"></a>
                        </div>
                        <h4 class="sub-title mb-20"><a class="partner-link" data-partner-id="${partner.PartnerID}" href="#">${partner.FullName}</a></h4>
                        <div class="course__meta">
                            <span>${partner.Bio}</span>
                        </div>
                        <br>
                        <h6>${partner.SessionPrice}$/hour</h6>
                    </div>
                </div>
            `);
            partnersContainer.append(partnerDiv);
        });
    } else {
        partnersContainer.html("<p>No partners available.</p>");
    }
}

function getLanguageClasses(languageIDs) {
    var languageClasses = [];
    $.each(languageIDs, function(index, languageID) {
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

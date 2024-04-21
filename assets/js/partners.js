document.addEventListener("DOMContentLoaded", function() {
    // Make an AJAX request to fetch partner data from the PHP script
    fetchPartnersData();
});

function fetchPartnersData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://localhost/partners.php", true);
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
                partnerDiv.classList.add("col-lg-4", "col-md-6", "grid-item", "cat1", "cat5"); // Add classes to match the styling
                partnerDiv.innerHTML = `
                    <div class="z-gallery mb-30">
                        <div class="z-gallery__thumb mb-20">
                            <a href="#"><img class="img-fluid" src="${partner.image_url}" alt="" width="50" height="50"></a>
                            <div class="feedback-tag">${partner.AverageRating}</div>
                            <div class="heart-icon"><i class="fas fa-heart"></i></div>
                        </div>
                        <div class="z-gallery__content">
                            <div class="course__tag mb-15">
                                <span>English</span>
                                <span>Italian</span>
                                <a class="f-right" href="#"><img src="${partner.profile_picture}" width="85" height="85" alt="Partner picture"></a>
                            </div>
                            <h4 class="sub-title mb-20"><a href="#">${partner.FullName}</a></h4>
                            <div class="course__meta">
                                <span>${partner.Bio}</span>
                            </div>
                            <br>
                            <h6>${partner.hourly_rate}$/hour</h6>
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

function fetchLearnerDataFromUrl() {
    // Extract learner ID from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const learnerId = urlParams.get('learnerId');

    if (learnerId) {
        fetch(`http://localhost/Web-Project/assets/php/Plearner_profile.php?learnerId=${learnerId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Fetched learner data:', data); // Log the fetched data
            // Call the displayLearnerData function with the retrieved data
            displayLearnerData(data.learnerData);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    } else {
        console.error('Learner ID not found in the URL.');
    }
}

function displayLearnerData(learnerData) {
    // Get the learner container element
    const learnerContainer = document.getElementById('learner-container');

    // Check if the learner container element exists
    if (learnerContainer) {
        // Create a div element for the learner profile
        const learnerProfile = document.createElement('div');
        learnerProfile.classList.add('learner-profile');

        // Construct the HTML content for the learner profile
        learnerProfile.innerHTML = `
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <img class="img-fluid" src="${learnerData.Photo}" alt="Learner profile picture" width="300" height="300">
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="profile">
                    <h2>Learner Profile</h2>
                    <ul class="profile-list mb-50">
                        <li>First Name : <span>${learnerData.FirstName}</span></li>
                        <li>Last Name : <span>${learnerData.LastName}</span></li>
                        <li>Email : <span>${learnerData.Email}</span></li>
                        <li>City : <span>${learnerData.City}</span></li>
                        <li>Username : <span>${learnerData.UserName}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="profile">
                    <h2>Languages</h2>
                    <ul class="work-progress mb-50">
                        ${learnerData.Languages ? learnerData.Languages.split(',').map(language => {
                            const [lang, level] = language.split(':');
                            let backgroundColor;
                            switch (level) {
                                case 'Beginner':
                                    backgroundColor = '#e75115';
                                    break;
                                case 'Intermediate':
                                    backgroundColor = '#f7b500';
                                    break;
                                case 'Advanced':
                                    backgroundColor = '#0dbf73';
                                    break;
                                default:
                                    backgroundColor = '#ccc';
                            }
                            return `
                            <li>
                                <div class="pie-chart" style="background-color: ${backgroundColor};">
                                    <div class="progress-content">
                                        <h6>${lang}</h6>
                                        <b>${level}</b>
                                    </div>
                                </div>
                            </li>`;
                        }).join('') : '<li>No languages found</li>'}
                    </ul>
                </div>
            </div>
        </div>
        `;

        // Append the learner profile to the learner container
        learnerContainer.appendChild(learnerProfile);
    } else {
        console.error("Learner container not found.");
    }
}

// Fetch learner data from URL
fetchLearnerDataFromUrl();

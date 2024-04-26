/* document.addEventListener('DOMContentLoaded', function() {
    // Load the sessions
    loadSessions();

    // Function to load sessions using fetch
    function loadSessions() {
        fetch('../php/ViewSessionsP.php')
            .then(function(response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error loading sessions');
                }
            })
            .then(function(data) {
                // Clear the current and previous session lists
                document.getElementById('current-sessions-p').innerHTML = '';
                document.getElementById('previous-sessions-p').innerHTML = '';

                // Iterate through the sessions and add them to the appropriate list
                for (var i = 0; i < data.length; i++) {
                    var session = data[i];
                    var sessionItem = '<div class="col-lg-4 col-md-6">' +
                        '<div class="plan text-center mb-30">' +
                        '<div class="pr__header mb-3">' +
                        '<img src="../assets/img/icon/writing.svg" alt="writing icon" class="pr-icon">' +
                        '</div>' +
                        '<div class="pr__body">' +
                        '<ul class="price-list">' +
                        '<li>Learner: ' + session.LearnerID + '</li>' +
                        '<li> Day and time: ' + session.SessionDate + '</li>' +
                        '<li> duration: ' + session.duration + '</li>' +
                        '</ul>' +
                        '</div>' +
                        '<div class="pr__footer mt-50">' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    if (session.Status === 'Scheduled') {
                        document.getElementById('current-sessions-p').innerHTML += sessionItem;
                    } else {
                        document.getElementById('previous-sessions-p').innerHTML += sessionItem;
                    }
                }
            })
            .catch(function(error) {
                console.error('Error loading sessions:', error);
            });
    }
});
*/
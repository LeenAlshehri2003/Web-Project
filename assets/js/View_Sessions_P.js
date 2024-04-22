$(document).ready(function() {
    // Load the sessions
    loadSessions();

    // Function to load sessions using AJAX
    function loadSessions() {
        $.ajax({
            url: '../php/ViewSessionsP.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Clear the current and previous session lists
                $('#current-sessions-l').empty();
                $('#previous-sessions-l').empty();

                // Iterate through the sessions and add them to the appropriate list
                for (var i = 0; i < response.length; i++) {
                    var session = response[i];
                    var sessionItem = '<div class="col-lg-4 col-md-6">' +
                                          '<div class="plan text-center mb-30">' +
                                              '<div class="pr__header mb-3">' +
                                                  '<img src="../assets/img/icon/writing.svg" alt="writing icon" class="pr-icon">' +
                                              '</div>' +
                                              '<div class="pr__body">' +
                                                  '<ul class="price-list">' +
                                                      '<li>Learner: ' + session.LearnerID + '</li>' +
                                                      '<li>Proficiency level: ' + session.ProficiencyLevel + '</li>' +
                                                      '<li> duration: ' + session.duration + '</li>' +
                                                      '<li>' + session.SessionDate + '</li>' +
                                                  '</ul>' +
                                              '</div>' +
                                              '<div class="pr__footer mt-50">' +
                                              '</div>' +
                                          '</div>' +
                                      '</div>';

                    if (session.Status === 'Scheduled' ) {
                        $('#current-sessions-p').append(sessionItem);
                    } else {
                        $('#previous-sessions-p').append(sessionItem);
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading sessions:', error);
            }
        });
    }
});
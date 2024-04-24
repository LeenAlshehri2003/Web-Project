<?php
// Include the database connection
require_once 'db.php';

// Check if request ID is provided in the URL
if(isset($_GET['request_id'])) {
    // Sanitize the input to prevent SQL injection
    $request_id = mysqli_real_escape_string($conn, $_GET['request_id']);
    
    // Prepare SQL statement to retrieve request details
    $sql = "SELECT lr.*, CONCAT(u.FirstName, ' ', u.LastName) AS FullName, l.LanguageName ,u.Photo AS ProfilePicture
            FROM languagerequests lr 
            JOIN users u ON lr.LearnerID = u.UserID 
            JOIN languages l ON lr.LanguageID = l.LanguageID 
            WHERE lr.RequestID = '$request_id'";
    
    // Execute the query
    $result = $conn->query($sql);
    
    // Check if query was successful
    if($result) {
        // Check if any rows were returned
        if($result->num_rows > 0) {
            // Fetch the row as an associative array
            $row = $result->fetch_assoc();
            
            // Calculate end time based on preferred schedule and session duration
            $preferredSchedule = new DateTime($row['PreferredSchedule']);
            $startTime = $preferredSchedule->format('H:i');
            $endTime = clone $preferredSchedule;
            $endTime->add(new DateInterval('PT' . $row['SessionDuration'] . 'H'));
            $endTime = $endTime->format('H:i');

            // Output the request details in the desired format
            echo '<main>
                    <div class="section-title text-center mb-55">    
                        <div class="request-details-container">
                            <div class="request-details-header">
                                <a href="partner_view_requests.php" class="theme_btn comment_btn">return back</a>
                            </div>
        
                            <div class="center-containter">
                                <h1>Request details</h1>
                                <img class="profile-picture big-img" alt="profile-picture" src="../assets/img/Partners images/' . $row['ProfilePicture'] . '">                            
                            </div>
            
                            <div class="request-details-body">
                                <p><strong>Status:</strong> <span id="status">' . $row['Status'] . '</span></p>
                                <a href="" class="profile-link">view learner profile</a>
                                <p><strong>Learner Name:</strong> <span id="learnerName">' . $row['FullName'] . '</span></p>
                                <p><strong>Language Goals:</strong> <span id="languageGoals">Improve Fluency In ' . $row['LanguageName'] . '</span></p>
                                <p><strong>Proficiency Level:</strong> <span id="proficiencyLevel">' . $row['ProficiencyLevel'] . '</span></p>
                                <p><strong>Scheduled to be on:</strong> <span id="scheduledDate">' . $row['PreferredSchedule'] . '</span> <strong>from</strong> <span id="startTime">' . $startTime . '</span> <strong>to</strong> <span id="endTime">' . $endTime . '</span></p>
                                <p><strong>Session duration:</strong> <span id="sessionDuration">' . $row['SessionDuration'] . '</span></p>';

            // Check if status is Pending, then show accept and reject buttons
            if ($row['Status'] == 'Pending') {
                echo '<div  class="decide-request">
                <div><button onclick="updateStatus(\'Accepted\')" class="theme_btn free_btn acception-button accept-btn" style="background-color: green;" >Accept</button></div>
                <div><button onclick="updateStatus(\'Rejected\')" class="theme_btn free_btn acception-button reject-btn" style="background-color: red;">Reject</button></div>
                      </div>';
            }

            echo '</div> <!-- Close request-details-body -->
                    </div> <!-- Close request-details-container -->
                </div> <!-- Close section-title -->
            </main>'; // Close main
        } else {
            echo "No request found with ID: $request_id";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
} else {
    echo "Request ID not provided in the URL";
}

// Close the database connection
$conn->close();
?>

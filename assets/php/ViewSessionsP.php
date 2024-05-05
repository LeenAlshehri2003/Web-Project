<?php
require_once 'db.php'; // Ensure this points to your actual database connection script
session_start();

//Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: SignInLearner.php"); // Redirect them to the login page if not logged in
    exit('User not logged in.'); // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

// Retrieve sessions from the database
$stmt = $conn->prepare("SELECT lr.RequestID, lr.PreferredSchedule, lr.SessionDuration, lr.Status,
                          u.FirstName AS LearnerFirstName, u.LastName AS LearnerLastName,
                          lr.ProficiencyLevel, l.LanguageName
                      FROM languagerequests lr
                      JOIN users u ON lr.LearnerID = u.UserID
                      JOIN languages l ON lr.LanguageID = l.LanguageID
                      WHERE lr.PartnerID = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$currentDate = date('Y-m-d H:i:s'); // Get the current date and time

$sessions = array();

while ($row = $result->fetch_assoc()) {
    if ($row['Status'] == 'Accepted') {
        $learnerFirstName = $row['LearnerFirstName'];
        $learnerLastName = $row['LearnerLastName'];
        $duration = $row['SessionDuration'];
        $sessionDate = $row['PreferredSchedule'];
        $proficiencyLevel = $row['ProficiencyLevel'];
        $languageName = $row['LanguageName'];
        $status = ($sessionDate > $currentDate) ? 'Scheduled' : 'Completed';

        $session = array(
            'LearnerFirstName' => $learnerFirstName,
            'LearnerLastName' => $learnerLastName,
            'Duration' => $duration,
            'SessionDate' => $sessionDate,
            'Status' => $status,
            'ProficiencyLevel' => $proficiencyLevel,
            'LanguageName' => $languageName
        );

        $sessions[] = $session;
    }
}

$conn->close();
?>
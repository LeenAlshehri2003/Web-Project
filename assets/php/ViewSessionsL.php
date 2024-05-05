<?php
require_once 'db.php'; // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: SignInLearner.php"); // Redirect them to the login page if not logged in
    exit('User not logged in.'); // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

// Retrieve sessions from the database
$stmt = $conn->prepare("SELECT lr.RequestID, lr.SessionDuration, lr.PreferredSchedule, lr.Status, lr.RequestID, u.FirstName AS PartnerFirstName, u.LastName AS PartnerLastName, l.LanguageName
    FROM languagerequests lr
    JOIN users u ON lr.PartnerID = u.UserID
    JOIN languages l ON lr.LanguageID = l.LanguageID
    WHERE lr.LearnerID = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$currentDate = date('Y-m-d H:i:s'); // Get the current date and time

$sessions = array();

while ($row = $result->fetch_assoc()) {
    if ($row['Status'] == 'Accepted') {
        $duration = $row['SessionDuration'];
        $sessionDate = $row['PreferredSchedule'];
        $sessionID = $row['RequestID'];
        $partnerFirstName = $row['PartnerFirstName'];
        $partnerLastName = $row['PartnerLastName'];
        $languageName = $row['LanguageName'];
        $status = ($sessionDate > $currentDate) ? 'Scheduled' : 'Completed';

        $session = array(
            'Duration' => $duration,
            'SessionDate' => $sessionDate,
            'Status' => $status,
            'SessionID' => $sessionID,
            'PartnerFirstName' => $partnerFirstName,
            'PartnerLastName' => $partnerLastName,
            'LanguageName' => $languageName
        );


        $sessions[] = $session;
    }
}

$conn->close();
?>
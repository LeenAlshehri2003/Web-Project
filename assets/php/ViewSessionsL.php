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
$stmt = $conn->prepare("SELECT s.Duration, s.SessionDate, s.Status, s.SessionID, u.FirstName AS PartnerFirstName, u.LastName AS PartnerLastName, l.LanguageName
    FROM sessions s
    JOIN users u ON s.PartnerID = u.UserID
    JOIN languages l ON s.LanguageID = l.LanguageID
    WHERE s.LearnerID = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$sessions = array();

while ($row = $result->fetch_assoc()) {
    $duration = $row['Duration'];
    $sessionDate = $row['SessionDate'];
    $status = $row['Status'];
    $sessionID = $row['SessionID'];
    $partnerFirstName = $row['PartnerFirstName'];
    $partnerLastName = $row['PartnerLastName'];
    $languageName = $row['LanguageName'];

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

$conn->close();
?>
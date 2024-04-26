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
$stmt = $conn->prepare("SELECT s.Duration, s.SessionDate, s.Status,
                           u.FirstName AS LearnerFirstName, u.LastName AS LearnerLastName,
                           ul.ProficiencyLevel, l.LanguageName
                       FROM sessions s
                       JOIN learners lrs ON s.LearnerID = lrs.LearnerID
                       JOIN users u ON lrs.LearnerID = u.UserID
                       JOIN userlanguages ul ON u.UserID = ul.UserID AND s.LanguageID = ul.LanguageID
                       JOIN languages l ON s.LanguageID = l.LanguageID
                       WHERE s.PartnerID = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$sessions = array();

while ($row = $result->fetch_assoc()) {
    $learnerFirstName = $row['LearnerFirstName'];
    $learnerLastName = $row['LearnerLastName'];
    $duration = $row['Duration'];
    $sessionDate = $row['SessionDate'];
    $status = $row['Status'];
    $proficiencyLevel = $row['ProficiencyLevel'];
    $languageName = $row['LanguageName'];

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

$conn->close();
?>
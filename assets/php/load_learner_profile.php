<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

// Fetch personal info along with languages and their proficiency levels
$stmt = $conn->prepare("
    SELECT u.FirstName, u.LastName, u.Email, u.City, u.Photo,
           l.LanguageName, ul.ProficiencyLevel
    FROM Users u
    JOIN Learners ON u.UserID = Learners.LearnerID
    LEFT JOIN UserLanguages ul ON u.UserID = ul.UserID
    LEFT JOIN Languages l ON ul.LanguageID = l.LanguageID
    WHERE u.UserID = ?");
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$learnerData = [];  // Array to store all learner data including languages
$languages = [];  // Sub-array to store languages and proficiency levels

while ($row = $result->fetch_assoc()) {
    $learnerData['FirstName'] = $row['FirstName'];
    $learnerData['LastName'] = $row['LastName'];
    $learnerData['Email'] = $row['Email'];
    $learnerData['City'] = $row['City'];
    $learnerData['Photo'] = $row['Photo'];

    if (!empty($row['LanguageName'])) {
        $languages[] = [
            'LanguageName' => $row['LanguageName'],
            'ProficiencyLevel' => $row['ProficiencyLevel']
        ];
    }
}

$learnerData['Languages'] = $languages;  // Add languages to the main data array

$conn->close();
?>
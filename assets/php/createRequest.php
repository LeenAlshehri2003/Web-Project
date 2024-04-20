<?php
include 'db.php'; // Ensures the database connection is included

// Assume POST method is used for form submission
$proficiencyLevel = $_POST['proficiencyLevel'] ?? '';
$languagePartner = $_POST['languagePartner'] ?? '';
$sessionDate = $_POST['sessionDate'] ?? '';
$sessionStartTime = $_POST['sessionStartTime'] ?? '';
$language = $_POST['languageSelect'] ?? '';
$sessionDuration = $_POST['sessionDuration'] ?? '';

// Server-side validation
if (empty($proficiencyLevel) || empty($languagePartner) || empty($sessionDate) || empty($sessionStartTime) || empty($language) || empty($sessionDuration)) {
    die("All fields are required.");
}

// Convert session date and time into a single datetime string for database insertion
$sessionDateTime = $sessionDate . ' ' . $sessionStartTime;

// Insert into database
$query = "INSERT INTO languagerequests (ProficiencyLevel, PartnerID, PreferredSchedule, LanguageID, SessionDuration) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssi", $proficiencyLevel, $languagePartner, $sessionDateTime, $language, $sessionDuration);
if ($stmt->execute()) {
    echo "Request posted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
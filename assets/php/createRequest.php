<?php
include 'db.php'; // Ensures the database connection is included

$proficiencyLevel = $_POST['proficiencyLevel'] ?? '';
$selectedOption = $_POST['languagePartner'] ?? ''; // This will contain "PartnerID-LanguageID"
$sessionDate = $_POST['sessionDate'] ?? '';
$sessionStartTime = $_POST['sessionStartTime'] ?? '';
$sessionDuration = $_POST['sessionDuration'] ?? '';

// Split the selected option into PartnerID and LanguageID
list($partnerID, $languageID) = explode('-', $selectedOption);

// Server-side validation
if (empty($proficiencyLevel) || empty($partnerID) || empty($languageID) || empty($sessionDate) || empty($sessionStartTime) || empty($sessionDuration)) {
    die("All fields are required.");
}

// Convert session date and time into a single datetime string for database insertion
$sessionDateTime = $sessionDate . ' ' . $sessionStartTime;

// Prepare the SQL statement
$query = "INSERT INTO languagerequests (ProficiencyLevel, PartnerID, PreferredSchedule, LanguageID, SessionDuration) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    exit;
}

// Bind and execute the statement
$stmt->bind_param("siisi", $proficiencyLevel, $partnerID, $sessionDateTime, $languageID, $sessionDuration);
if ($stmt->execute()) {
    echo "Request posted successfully.";
} else {
    echo "Error posting request: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
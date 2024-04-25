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

// Include the current date as SubmitDate
$submitDate = date('Y-m-d H:i:s');

// Prepare the SQL statement with SubmitDate
$query = "INSERT INTO languagerequests (ProficiencyLevel, PartnerID, PreferredSchedule, LanguageID, SessionDuration, SubmitDate) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    exit;
}

// Bind and execute the statement with the new submitDate parameter
$stmt->bind_param("siisis", $proficiencyLevel, $partnerID, $sessionDateTime, $languageID, $sessionDuration, $submitDate);
if ($stmt->execute()) {
    echo "Request posted successfully.";
} else {
    echo "Error posting request: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
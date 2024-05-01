<?php
include 'db.php'; // Ensures the database connection is included
session_start();

$learnerID = $_SESSION['user_id'];

$proficiencyLevel = $_POST['proficiencyLevel'] ?? '';
$selectedOption = $_POST['languagePartner'] ?? ''; // This will contain "PartnerID-LanguageID"
$sessionDate = $_POST['sessionDate'] ?? '';
$sessionStartTime = $_POST['sessionStartTime'] ?? '';
$sessionDuration = isset($_POST['sessionDuration']) ? intval($_POST['sessionDuration']) : 0;
$status=$_POST['Status'] ?? '';
// Split the selected option into PartnerID and LanguageID
list($partnerID, $languageID) = explode('-', $selectedOption);

// Server-side validation
if (empty($proficiencyLevel) || empty($partnerID) || empty($languageID) || empty($sessionDate) || empty($sessionStartTime) || empty($sessionDuration)) {
    die("All fields are required.");
}

// Convert session date and time into a single datetime string for database insertion
$sessionDateTime = $sessionDate . ' ' . $sessionStartTime;

// Include the current date as SubmitDate
// Prepare the SQL statement to retrieve the current date and time
$sql = "SELECT NOW() as CurrentDateTime";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result into an associative array and store in $submitDate
    $row = $result->fetch_assoc();
    $submitDate = $row['CurrentDateTime'];
} else {
    echo "No data retrieved!";
}

// Prepare the SQL statement with SubmitDate
$query = "INSERT INTO languagerequests (ProficiencyLevel, PartnerID, PreferredSchedule, LanguageID, SessionDuration, SubmitDate, Status, LearnerID) VALUES (?, ?, ?, ?, ?, ?,?,?)";
$stmt = $conn->prepare($query);
if (!$stmt) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    exit;
}

// Bind and execute the statement with the new submitDate parameter
$stmt->bind_param("sisiissi", $proficiencyLevel, $partnerID, $sessionDateTime, $languageID, $sessionDuration, $submitDate, $status, $learnerID);
if ($stmt->execute()) {
    header("Location: http://localhost/Web-Project/HTML pages/View Requests- Learner.php?");
} else {
    echo "Error posting request: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
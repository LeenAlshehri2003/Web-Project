<?php
include_once('db.php');
$db = new Database();
$conn = $db->getConnection();

// Get data from form submission
$requestId = $_POST['RequestID']; // Ensure you are sending this from your form
$proficiencyLevel = $_POST['ProficiencyLevel'];
$sessionDate = $_POST['SessionDate'];
$sessionDuration = $_POST['SessionDuration'];
$sessionTime = $_POST['SessionTime']; // Ensure this maps to your table column correctly

// Convert session time and date into a single datetime format if necessary
$preferredSchedule = date('Y-m-d H:i:s', strtotime("$sessionDate $sessionTime"));

// SQL to update the record without changing the Status
$sql = "UPDATE languagerequests SET 
        ProficiencyLevel = ?, 
        PreferredSchedule = ?, 
        SessionDuration = ?
        WHERE RequestID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $proficiencyLevel, $preferredSchedule, $sessionDuration, $requestId);
$result = $stmt->execute();

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Request updated successfully']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update request']);
}

$stmt->close();
$conn->close();
?>
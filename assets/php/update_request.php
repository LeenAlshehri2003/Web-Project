<?php
session_start();
require 'db.php'; // Ensure this path is correct for your database connection script

// Redirect if not logged in


$requestID = isset($_GET['RequestID']) ? $_GET['RequestID'] : null; // Assuming you pass the request ID as a GET parameter

// Initialize variables to store request data
$proficiencyLevel = $sessionDate = $sessionDuration = $sessionTime = "";

// Retrieve existing request information
if ($_SERVER["REQUEST_METHOD"] == "GET" && $requestID) {
    $requestQuery = $conn->prepare("
        SELECT ProficiencyLevel, SessionDate, SessionDuration, SessionTime
        FROM languagerequests
        WHERE RequestID = ?");
    $requestQuery->bind_param("i", $requestID);
    $requestQuery->execute();
    $result = $requestQuery->get_result();
    if ($row = $result->fetch_assoc()) {
        $requestDetails = [
            'ProficiencyLevel' => $row['ProficiencyLevel'],
            'SessionDuration' => $row['SessionDuration'],
           
        ];
    }
    $requestQuery->close();
}

// Handle form submission to update request data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['RequestID'])) {
    $requestID = $conn->real_escape_string($_POST['RequestID']);
    $proficiencyLevel = $conn->real_escape_string($_POST['ProficiencyLevel']);
    
    // Concatenate session date and time into one datetime string
    $sessionDate = $conn->real_escape_string($_POST['SessionDate']);
    $sessionTime = $conn->real_escape_string($_POST['SessionTime']);
    $preferredSchedule = date('Y-m-d H:i:s', strtotime("$sessionDate $sessionTime"));

    // Update request details
    $updateRequest = $conn->prepare("
        UPDATE languagerequests 
        SET ProficiencyLevel=?, PreferredSchedule=? 
        WHERE RequestID=?");
    $updateRequest->bind_param("ssi", $proficiencyLevel, $preferredSchedule, $requestID);
    $updateRequest->execute();
    $updateRequest->close();

    // Redirect to a success page or perform additional actions
    header('Location: ../../HTML pages/View Requests- Learner.php');
    exit;
}
?>
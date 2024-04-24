<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

$db = new Database();
$conn = $db->getConnection(); // Get the database connection

// Retrieve sessions from the database
$query = "SELECT LearnerID, ProficiencyLevel, duration, SessionDate, Status FROM sessions WHERE PartnerID = $userId";
$result = mysqli_query($connection, $query);

// Prepare an array to store the session data
$sessions = array();

// Iterate through the result and add each session to the array
while ($row = mysqli_fetch_assoc($result)) {
    $sessions[] = $row;
}

// Convert the array to JSON and output the response
header('Content-Type: application/json');
echo json_encode($sessions);
?>
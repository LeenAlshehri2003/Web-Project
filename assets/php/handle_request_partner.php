<?php
// Assuming you have established a database connection
// Include your database connection script
require_once 'db.php';

// Start the session
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.'); // Proper handling for not logged-in users
    echo "not logged in";
}

$userId = $_SESSION['user_id'];

// Create a Database object
$db = new Database();

// Get the database connection
$conn = $db->getConnection();
/////////////////////////////////////////////////////
// Handle accept and reject requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['decision'])) {
    $decision = $_POST['decision'];
    if ($decision === 'accept') {
        // Update the status in the database to 'Accepted'
        $query = "UPDATE languagerequests SET Status = 'Accepted' WHERE RequestID = ?";
    } elseif ($decision === 'reject') {
        // Update the status in the database to 'Rejected'
        $query = "UPDATE languagerequests SET Status = 'Rejected' WHERE RequestID = ?";
    }

    // Prepare and execute the query
    $stmt = $pdo->prepare($query);
    $stmt->execute([$requestId]); // $requestId is the ID of the request you want to update

    // Redirect to the requestslist page
    header('Location: requestslist.php');
    exit;
}
?>

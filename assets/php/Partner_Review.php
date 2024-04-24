<?php
require_once 'db.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.'); // Proper handling for not logged-in users
}

$db = new Database();
$conn = $db->getConnection();


// Retrieve form data
$comment = $_POST['comment'];
$rating = $_POST['rating'];
$sessionID = $_POST['sessionID'];

// Prepare the SQL statement to insert the review
$stmt = $conn->prepare("INSERT INTO reviews (SessionID, Rating, Comment) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $sessionID, $rating, $comment);
$stmt->execute();

// Check if the review was successfully inserted
if ($stmt->affected_rows > 0) {
    echo "Review submitted successfully!";
} else {
    echo "Failed to submit the review. Please try again.";
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
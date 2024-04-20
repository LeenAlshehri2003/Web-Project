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


// Retrieve form data
$comment = $_POST['comment'];
$rating = $_POST['rating'];

// Prepare the SQL statement to insert the review
$stmt = $mysqli->prepare("INSERT INTO reviews (ReviewID, SessionID, Rating, Comment) VALUES (?, ?, ?, ?)");
$stmt->bind_param("iiis", 1, 1, $rating, $comment);
$stmt->execute();

// Check if the review was successfully inserted
if ($stmt->affected_rows > 0) {
    echo "Review submitted successfully!";
} else {
    echo "Failed to submit the review. Please try again.";
}

// Close the statement and database connection
$stmt->close();
$mysqli->close();
?>
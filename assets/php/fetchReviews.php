<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

/* Ensure the user is logged in*/
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id']; 


$db = new Database();
$conn = $db->getConnection(); // Get the database connection

// Fetch the language partner ID from the GET request parameters
$languagePartnerId = $_GET['partnerId'];

// Prepare and execute the database query to fetch the reviews for the given language partner ID
$stmt = $pdo->prepare('SELECT r.Rating, r.Comment, r.CreatedAt, u.FirstName, u.LastName, u.Photo
                      FROM reviews r
                      INNER JOIN sessions s ON r.SessionID = s.SessionID
                      INNER JOIN users u ON s.LearnerID = u.UserID
                      WHERE s.PartnerID = :partnerId');
$stmt->bindParam(':partnerId', $languagePartnerId, PDO::PARAM_INT);
$stmt->execute();

// Fetch all the reviews as an associative array
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the reviews JSON data
echo json_encode($reviews);
?>
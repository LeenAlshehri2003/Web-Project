<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

//Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}
$userId = $_SESSION['user_id']; 




if (isset($_GET['partnerId']) && is_numeric($_GET['partnerId'])) {
    $partnerId = (int)$_GET['partnerId']; }



// Prepare and execute the database query to fetch the reviews for the given language partner ID
$stmt = $conn->prepare("SELECT r.Rating, r.Comment, r.CreatedAt, u.FirstName, u.LastName, u.Photo
                      FROM reviews r
                      INNER JOIN sessions s ON r.SessionID = s.SessionID
                      INNER JOIN users u ON s.LearnerID = u.UserID
                      WHERE s.PartnerID = ?");
$stmt->bind_param("i", $partnerId);
$stmt->execute();
$result = $stmt->get_result();


$comments = array();


while ($row = $result->fetch_assoc()) {
    $rating = $row['Rating'];
    $comment = $row['Comment'];
    $createdAt = $row['CreatedAt'];
    $firstName = $row['FirstName'];
    $lastName = $row['LastName'];
    $photo = $row['Photo'];

    $comment = array(
        'Rating' => $rating,
        'Comment' => $comment,
        'CreatedAt' => $createdAt,
        'FirstName' => $firstName,
        'LastName' => $lastName,
        'Photo' => $photo,
    );

    $comments[] = $comment;
    
}
$stmt->close();
$conn->close();

?>


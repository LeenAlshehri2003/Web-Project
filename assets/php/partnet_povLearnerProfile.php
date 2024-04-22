<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

// Fetch personal info along with any additional details specific to partners
$stmt = $conn->prepare("
    SELECT u.FirstName, u.LastName, u.Email, u.City, u.Photo,
           p.PartnerDetails
    FROM Users u
    JOIN Partners p ON u.UserID = p.PartnerID
    WHERE u.UserID = ?");
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$partnerData = [];  // Array to store all partner data

while ($row = $result->fetch_assoc()) {
    $partnerData['FirstName'] = $row['FirstName'];
    $partnerData['LastName'] = $row['LastName'];
    $partnerData['Email'] = $row['Email'];
    $partnerData['City'] = $row['City'];
    $partnerData['Photo'] = $row['Photo'];
    $partnerData['PartnerDetails'] = $row['PartnerDetails'];
}

$conn->close();
?>

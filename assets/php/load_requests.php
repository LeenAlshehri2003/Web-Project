<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['learner_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}

$userId = $_SESSION['learner_id'];

$db = new Database();
$conn = $db->getConnection(); // Get the database connection

// SQL query to fetch all requests along with the partner's photo
// Assuming that `PartnerID` in `languagerequests` corresponds to `UserID` in `users`
$sql = "SELECT lr.*, u.Photo AS PartnerPhoto
        FROM languagerequests lr
        INNER JOIN users u ON lr.PartnerID = u.UserID
        WHERE lr.LearnerID = ?";  // Filter requests for the logged-in learner

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId); // Bind the learner ID to the parameter
$stmt->execute();
$result = $stmt->get_result();

$requests = []; // Array to hold the fetched data

if ($result->num_rows > 0) {
    // Fetch each row and add it to the 'requests' array
    while($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
} else {
    echo "0 results"; // No data found
}

// Output the array in JSON format
echo json_encode($requests);

// Close the database connection if it's not done within your Database class
$conn->close();
?>
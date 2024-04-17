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

// SQL query to fetch all requests along with the partner's photo
$sql = "SELECT lr.*, u.Photo AS PartnerPhoto
        FROM languagerequests lr
        JOIN users u ON lr.PartnerID = u.UserID";  // Joining with the users table to fetch the partner's photo

$result = $conn->query($sql);

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
<?php
// Include your database connection script
require_once 'db.php';

// Start the session
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.'); // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

// Create a Database object
$db = new Database();

// Get the database connection
$conn = $db->getConnection();

// SQL query to fetch all requests along with the partner's photo
$sql = "SELECT lr.*, u.Photo AS PartnerPhoto, u.FirstName AS PartnerFirstName, u.LastName AS PartnerLastName
        FROM languagerequests lr
        JOIN users u ON lr.PartnerID = u.UserID"; // Joining with the users table to fetch the partner's photo

// Execute the query
$result = $conn->query($sql);

$requests = []; // Array to hold the fetched data

if ($result) {
    // Fetch each row and add it to the 'requests' array
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
} else {
    echo "Error: " . $conn->error; // Display error message if query fails
}

// Close the database connection if it's not done within your Database class
$conn->close();
?>

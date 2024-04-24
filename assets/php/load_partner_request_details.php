<?php
require_once 'db.php'; // Include your database connection script

// Create a Database object and get the connection
$db = new Database();
$conn = $db->getConnection();

// Check if connection is successful
if (!$conn) {
    // Handle connection error gracefully
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize request ID
$requestId = null;

// Check if the request ID is provided in the URL
if (isset($_GET['request_id'])) {
    // Sanitize and validate the request ID
    $requestId = filter_input(INPUT_GET, 'request_id', FILTER_VALIDATE_INT);
}

// Check if the request ID is valid
if (!$requestId) {
    // Display an error message if the request ID is missing or invalid
    die("Invalid request ID.");
}

// Prepare and execute the SQL query to retrieve request details
$query = "SELECT * FROM languagerequests WHERE RequestID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $requestId); // Assuming RequestID is an integer
$stmt->execute();

// Fetch data
$result = $stmt->get_result();

// Check if any rows were found
if ($result->num_rows > 0) {
    // Fetch request details
    $requestDetails = $result->fetch_assoc();
    
    // Convert to JSON and echo the response
    echo json_encode($requestDetails);
} else {
    // Display an error message if no matching request was found
    echo json_encode(array('error' => 'Request not found.'));
}

// Close the database connection
$stmt->close();
$conn->close();
?>

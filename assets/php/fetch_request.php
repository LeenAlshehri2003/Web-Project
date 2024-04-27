<?php
// Ensure db.php points to your database connection script
include_once('db.php'); 

// Check if the request ID is passed as a GET parameter
if (isset($_GET['requestId'])) {
    $requestId = intval($_GET['requestId']); // Convert to integer to prevent SQL injection

    // Assuming $conn is your established mysqli connection
    // Prepare SQL statement to fetch the request
    $sql = "SELECT * FROM languagerequests WHERE RequestID = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $requestId); // Bind the integer as the parameter
        $stmt->execute();
        $result = $stmt->get_result();
        $requestDetails = $result->fetch_assoc();

        // Close statement
        $stmt->close();
    } else {
        // Handle error
        $requestDetails = null; // Ensure this variable is always set even if the query fails
    }
    $conn->close();
} else {
    // Redirect or handle the error if the requestId is not provided
    $requestDetails = null; // Set to null or redirect
}
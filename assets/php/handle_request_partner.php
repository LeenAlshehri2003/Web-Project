<?php
// Include the database connection
require_once 'db.php';

// Check if request ID and status are provided in the URL
if (isset($_GET['request_id']) && isset($_GET['status'])) {
    // Sanitize the input to prevent SQL injection
    $request_id = mysqli_real_escape_string($conn, $_GET['request_id']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);

    // Update the status in the database
    $updateSql = "UPDATE languagerequests SET Status = '$status' WHERE RequestID = '$request_id'";
    $updateResult = $conn->query($updateSql);

    

    // Check if the update was successful
    if ($updateResult) {

        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "Invalid request. Request ID and status not provided.";
}

// Close the database connection
$conn->close();
?>
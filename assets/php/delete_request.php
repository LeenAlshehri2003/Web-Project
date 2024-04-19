<?php
include_once('db.php'); // Ensure this points to your database connection script

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();

// Check if the request ID is present
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $requestId = intval($_POST['id']); // Convert to integer to avoid SQL injection

    // Prepare SQL statement to delete the request
    $sql = "DELETE FROM languagerequests WHERE RequestID = ?";

    // Prepare a prepared statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $requestId); // Bind the integer as the parameter

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(array("status" => "success", "message" => "Request deleted successfully"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Error deleting request"));
        }

        // Close statement
        $stmt->close();
    } else {
        echo json_encode(array("status" => "error", "message" => "Error preparing SQL statement"));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method or missing ID"));
}

// Close database connection
$conn->close();
?>
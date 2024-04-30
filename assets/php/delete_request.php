<?php
include_once('db.php'); // Ensure this points to your database connection script
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');
    header('Location: ../../HTML pages/SignInLearner.php');  // Proper handling for not logged-in users
}

// Check if the request ID is present and the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['requestId'])) {
    $requestId = intval($_GET['requestId']); // Convert to integer to avoid SQL injection

    // Assuming $conn is your established mysqli connection
    // Prepare SQL statement to delete the request
    $sql = "DELETE FROM languagerequests WHERE RequestID = ?";

    // Prepare a prepared statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $requestId); // Bind the integer as the parameter

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the requests view page
            header("Location: http://localhost/Web-Project/HTML pages/View Requests- Learner.php?");
            exit();
        } else {
            // Handle the error case, potentially logging it and showing an error message or page
           // header("Location: http://localhost/Web-Project/HTML pages/View Requests- Learner.php?status=error");
            exit();
        }

        // Close statement
        $stmt->close();
    } else {
        // Handle preparation error
       // header("Location: http://localhost/Web-Project/HTML pages/View Requests- Learner.php?status=preperror");
        exit();
    }
} else {
    // Redirect back if the request method is not correct or the ID is not set
   // header("Location: http://localhost/Web-Project/HTML pages/View Requests- Learner.php?status=invalid");
    exit();
}

// Assume that $conn is closed elsewhere if you're using persistent connections
?>
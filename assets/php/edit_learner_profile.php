<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['learnerID'])) {
    // If the user is not logged in, redirect to the login page or show an appropriate message
    echo "Please log in to access this page.";
    exit; // Stop further execution of the script
}

require_once 'db.php'; // Database connection

// Set the content type to HTML
header('Content-Type: text/html; charset=utf-8');

// Assuming the learner's ID is stored in a session variable after login
$learnerID = $_SESSION['learnerID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $firstName = $conn->real_escape_string(filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING));
    $lastName = $conn->real_escape_string(filter_var($_POST['LastName'], FILTER_SANITIZE_STRING));
    $city = $conn->real_escape_string(filter_var($_POST['City'], FILTER_SANITIZE_STRING));

    // Initialize filename variable for cases where the user doesn't upload a new photo
    $filename = '';

    // Handle file upload
    if (!empty($_FILES["profilePic"]["name"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["profilePic"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Specify allowed file types
        $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array(strtolower($fileType), $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFilePath)) {
                $filename = $fileName; // Use this filename for updating the DB record
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
        }
    }

    // Update the database
    $sql = "UPDATE Learners SET FirstName = ?, LastName = ?, City = ?" . (!empty($filename) ? ", Photo = '$filename'" : "") . " WHERE LearnerID = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssi", $firstName, $lastName, $city, $learnerID);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Profile updated successfully.";
            // Redirect to profile page or display success message
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    // Form not submitted
    echo "<p>Please fill in your profile information.</p>";
    // Display the form here or ensure the user knows how to access it
}

$conn->close();
?>
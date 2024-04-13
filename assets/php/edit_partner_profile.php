<?php
session_start();
require 'db.php'; // Ensure correct path

if (!isset($_SESSION['learnerID'])) {
    die("You must be logged in to edit your profile.");
}

$learnerID = $_SESSION['learnerID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize inputs
    $firstName = $conn->real_escape_string($_POST['FirstName']);
    $lastName = $conn->real_escape_string($_POST['LastName']);
    $city = $conn->real_escape_string($_POST['City']);
    $currentPassword = $_POST['CurrentPass'];
    $newPassword = $_POST['NewPass'];
    $confirmNewPassword = $_POST['ConfirmPass'];

    // Fetch current password from database
    $stmt = $conn->prepare("SELECT Password FROM Learners WHERE LearnerID = ?");
    $stmt->bind_param("i", $learnerID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $currentPasswordHash = $row['Password'];
        
        // Verify current password
        if (password_verify($currentPassword, $currentPasswordHash)) {
            // Check new password confirmation
            if ($newPassword === $confirmNewPassword) {
                // Hash new password
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                // Handle image upload
                $targetDir = "uploads/";
                $fileName = basename($_FILES["profilePic"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                // Additional file validation can be performed here
                move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFilePath);

                // Update learner information
                $updateStmt = $conn->prepare("UPDATE Learners SET FirstName = ?, LastName = ?, City = ?, Password = ?, Photo = ? WHERE LearnerID = ?");
                $updateStmt->bind_param("sssssi", $firstName, $lastName, $city, $newPasswordHash, $targetFilePath, $learnerID);
                $updateStmt->execute();

                if ($updateStmt->affected_rows > 0) {
                    echo "Profile updated successfully.";
                } else {
                    echo "No changes were made.";
                }
            } else {
                echo "New passwords do not match.";
            }
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request method.";
}
?>

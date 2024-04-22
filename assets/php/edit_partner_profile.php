<?php
session_start();
require 'db.php'; // Ensure correct path

if (!isset($_SESSION['partnerID'])) {
    die("You must be logged in to edit your profile.");
}

$partnerID = $_SESSION['partnerID'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize inputs
    $firstName = $conn->real_escape_string($_POST['FirstName']);
    $lastName = $conn->real_escape_string($_POST['LastName']);
    $city = $conn->real_escape_string($_POST['City']);
    $bio = $conn->real_escape_string($_POST['Bio']);
    $currentPassword = $_POST['CurrentPass'];
    $newPassword = $_POST['NewPass'];
    $confirmNewPassword = $_POST['ConfirmPass'];
    $selectedLanguages = $_POST['languages']; // Array of selected language IDs

    // Fetch current password from database
    $stmt = $conn->prepare("SELECT Password FROM partners WHERE PartnerID = ?");
    $stmt->bind_param("i", $partnerID);
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
                move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFilePath);

                // Begin transaction
                $conn->begin_transaction();

                // Update partner information including Bio
                $updateStmt = $conn->prepare("UPDATE partners SET FirstName = ?, LastName = ?, City = ?, Password = ?, Photo = ?, Bio = ? WHERE PartnerID = ?");
                $updateStmt->bind_param("ssssssi", $firstName, $lastName, $city, $newPasswordHash, $targetFilePath, $bio, $partnerID);
                $updateStmt->execute();

                // Clear existing languages
                $deleteStmt = $conn->prepare("DELETE FROM userlanguages WHERE UserID = ?");
                $deleteStmt->bind_param("i", $partnerID);
                $deleteStmt->execute();

                // Insert new language selections
                $insertStmt = $conn->prepare("INSERT INTO userlanguages (UserID, LanguageID) VALUES (?, ?)");
                foreach ($selectedLanguages as $languageID) {
                    $insertStmt->bind_param("ii", $partnerID, $languageID);
                    $insertStmt->execute();
                }

                // Commit transaction
                $conn->commit();

                if ($updateStmt->affected_rows > 0) {
                    echo "Profile and language preferences updated successfully.";
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
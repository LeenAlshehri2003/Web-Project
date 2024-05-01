<?php
session_start();
require 'db.php';  // Ensure this path is correct to your database connection file

function registerNewLearner($formData, $conn) {
    $username = htmlspecialchars(trim($formData['username']));
    $firstname = htmlspecialchars(trim($formData['firstname']));
    $lastname = htmlspecialchars(trim($formData['lastname']));
    $email = filter_var($formData['email'], FILTER_SANITIZE_EMAIL);
    $password = $formData['password'];  // Password will be hashed
    $city = htmlspecialchars(trim($formData['city']));
    $defaultPic = '../assets/img/DefaultProfilePic.jpg';  // Default profile picture if none provided
    $profilePic = $defaultPic;  // Use default if no picture is uploaded

    // Handle photo upload
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        $target_dir = "../assets/img/";  // Ensure this directory exists and has the correct permissions
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file type
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["picture"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                    $profilePic = $target_file;  // Set the actual path of the uploaded file
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                    return $error;
                }
            } else {
                $error = "File is not an image.";
                return $error;
            }
        } else {
            $error = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
            return $error;
        }
    }

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT username, Email FROM Users WHERE username = ? OR Email = ?");
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    if ($stmt->fetch()) {
        return "An account with this username or email already exists.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into Users table
    $stmt = $conn->prepare("INSERT INTO Users (username, FirstName, LastName, Email, Password, City, Photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $username, $firstname, $lastname, $email, $hashedPassword, $city, $profilePic);
    if (!$stmt->execute()) {
        return "Error creating user account: " . $stmt->error;
    }

    // Get the last inserted UserID
    $userId = $conn->insert_id;

    // Insert into Learners table
    $stmt = $conn->prepare("INSERT INTO Learners (LearnerID) VALUES (?)");
    $stmt->bind_param('i', $userId);
    if (!$stmt->execute()) {
        return "Error registering learner: " . $stmt->error;
    }

    // Set session variable to keep the user logged in
    $_SESSION['user_id'] = $userId;  // This is the login indicator
    $_SESSION['user_role'] = 'learner';  // Optional, to manage user roles

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewLearner($_POST, $conn);
    if ($result === true) {
        $_SESSION['registration_success'] = "Signup successful!";  // Set session variable
        header("Location: ../../HTML pages/HomeLearner.php");  // Redirect to home page of the learner
        exit();
    } else {
        $_SESSION['registration_error'] = $result;
        header("Location: ../../HTML pages/SignUpLearner.php");  // Redirect back to the signup page if there's an error
        exit();
    }
}

$conn->close();
?>

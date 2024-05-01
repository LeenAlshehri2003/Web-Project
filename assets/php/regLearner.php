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

     // Handle photo upload
     $userImage = $_FILES['photo'];
     $imageName = $userImage['name'];
     if ($imageName == "")
         $imageName = "DefaultProfilePic.jpg";
     
         $fileTmpName = $userImage['tmp_name'];
         $fileNewName = "../img/".$imageName;
         $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
     

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
    $stmt->bind_param('sssssss', $username, $firstname, $lastname, $email, $hashedPassword, $city, $imageName);
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

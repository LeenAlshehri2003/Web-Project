<?php
session_start();
require 'db.php';  // Ensure this path is correct to your database connection file

function registerNewLearner($formData, $conn) {
    $username = htmlspecialchars(trim($formData['username']));
    $firstname = htmlspecialchars(trim($formData['firstname']));
    $lastname = htmlspecialchars(trim($formData['lastname']));
    $age = filter_var($formData['age'], FILTER_SANITIZE_NUMBER_INT);
    $gender = htmlspecialchars(trim($formData['gender']));
    $email = filter_var($formData['email'], FILTER_SANITIZE_EMAIL);
    $password = $formData['password'];  // Password will be hashed
    $phone = htmlspecialchars(trim($formData['number']));
    $city = htmlspecialchars(trim($formData['city']));

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT username, Email FROM users WHERE username = ? OR Email = ?");
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    if ($stmt->fetch()) {
        return "An account with this username or email already exists.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into Users table
    $stmt = $conn->prepare("INSERT INTO users (username, FirstName, LastName, Email, Password, Phone, City, Age, Gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssis', $username, $firstname, $lastname, $email, $hashedPassword, $phone, $city, $age, $gender);
    if (!$stmt->execute()) {
        return "Error creating user account: " . $stmt->error;
    }

    // Get the last inserted UserID
    $userId = $conn->insert_id;

    // Insert into Learners table
    $stmt = $conn->prepare("INSERT INTO learners (LearnerID) VALUES (?)");
    $stmt->bind_param('i', $userId);
    if (!$stmt->execute()) {
        return "Error registering learner: " . $stmt->error;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewLearner($_POST, $conn);
    if ($result === true) {
        $_SESSION['registration_success'] = "Signup successful!";
        header("Location: ../../HTML pages/HomeLearner.php");  // Adjust this path if necessary
        exit();
    } else {
        $_SESSION['registration_error'] = $result;
        header("Location: ../../HTML pages/SignUpLearner.php");  // Adjust this path if necessary
        exit();
    }
}

$conn->close();
?>

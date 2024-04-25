<?php
session_start();
require 'db.php';  // Ensure this path is correct to your database connection file

function registerNewPartner($formData, $conn) {
    $username = htmlspecialchars(trim($formData['username']));
    $firstname = htmlspecialchars(trim($formData['firstname']));
    $lastname = htmlspecialchars(trim($formData['lastname']));
    $email = filter_var($formData['email'], FILTER_SANITIZE_EMAIL);
    $password = $formData['password'];  // Password will be hashed
    $city = htmlspecialchars(trim($formData['city']));
    $bio = htmlspecialchars($formData['bio']);
    $age = intval($formData['age']);
    $gender = htmlspecialchars($formData['gender']);
    $phone = htmlspecialchars($formData['number']);

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
    $stmt = $conn->prepare("INSERT INTO Users (username, FirstName, LastName, Email, Password, City) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $username, $firstname, $lastname, $email, $hashedPassword, $city);
    if (!$stmt->execute()) {
        return "Error creating user account: " . $stmt->error;
    }

    // Get the last inserted UserID
    $userId = $conn->insert_id;

    // Insert into Partners table
    $stmt = $conn->prepare("INSERT INTO partners (PartnerID, Bio, Age, Gender, Phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('isiss', $userId, $bio, $age, $gender, $phone);
    if (!$stmt->execute()) {
        return "Error registering partner: " . $stmt->error;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewPartner($_POST, $conn);
    if ($result === true) {
        $_SESSION['registration_success'] = "Signup successful!";  // Set session variable
        header("Location: ../../HTML pages/HomePartner.php");  // Redirect to home
        exit();
    } else {
        $_SESSION['registration_error'] = $result;
        header("Location: ../../HTML pages/SignUpPartner.php");
        exit();
    }
}


$conn->close();
?>

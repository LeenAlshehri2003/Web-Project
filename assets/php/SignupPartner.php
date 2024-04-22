<?php
require_once 'db.php';  // Ensure this points to your actual database connection script

session_start();
// Initialize database connection
$db = new Database();
$conn = $db->getConnection();



function registerNewPartner($formData) {
    $conn = getDBConnection();  // Acquire a database connection

    // Extract and sanitize input data
    $firstname = htmlspecialchars($formData['firstname']);
    $lastname = htmlspecialchars($formData['lastname']);
    $age = filter_var($formData['age'], FILTER_SANITIZE_NUMBER_INT);
    $gender = htmlspecialchars($formData['gender']);
    $email = filter_var($formData['email'], FILTER_SANITIZE_EMAIL);
    $password = $formData['password'];  // Password will be hashed, no need to sanitize
    $phone = htmlspecialchars($formData['number']);
    $city = htmlspecialchars($formData['city']);
    $bio = htmlspecialchars($formData['bio']);  // bio is a text field for partners

    // Check if email already exists
    $emailCheckStmt = $conn->prepare("SELECT email FROM Users WHERE email = ?");
    $emailCheckStmt->execute([$email]);
    if ($emailCheckStmt->fetch()) {
        return "An account with this email already exists.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into Users table
    $userInsertStmt = $conn->prepare("INSERT INTO Users (FirstName, LastName, Email, Password, City, Phone) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$userInsertStmt->execute([$firstname, $lastname, $email, $hashedPassword, $city, $phone])) {
        return "Error creating user.";
    }

    // Retrieve the last inserted user id for linking with Partners table
    $userId = $conn->lastInsertId();

    // Insert into Partners table
    $partnerInsertStmt = $conn->prepare("INSERT INTO Partners (UserID, Age, Gender, Bio) VALUES (?, ?, ?, ?)");
    if (!$partnerInsertStmt->execute([$userId, $age, $gender, $bio])) {
        return "Error registering as partner.";
    }

    return "Registration successful!";
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewPartner($_POST);
    echo $result;

    // Optionally, redirect or further process result like session management
}
?>

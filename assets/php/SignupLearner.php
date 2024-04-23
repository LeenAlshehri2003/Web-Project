<?php
require 'database.php';  // Ensure this path is correct to include your database connection script

function registerNewLearner($formData) {
    $conn = getDBConnection();  // Acquire a database connection

    // Extract and sanitize input data
    $firstname = htmlspecialchars(trim($formData['firstname']));
    $lastname = htmlspecialchars(trim($formData['lastname']));
    $age = filter_var($formData['age'], FILTER_SANITIZE_NUMBER_INT);
    $gender = htmlspecialchars(trim($formData['gender']));
    $email = filter_var($formData['email'], FILTER_SANITIZE_EMAIL);
    $password = $formData['password'];  // Password will be hashed, no need to sanitize
    $phone = htmlspecialchars(trim($formData['number']));
    $city = htmlspecialchars(trim($formData['city']));
    $latitude = htmlspecialchars(trim($formData['latitude']));
    $longitude = htmlspecialchars(trim($formData['longitude']));

    // Check if email already exists
    $stmt = $conn->prepare("SELECT email FROM Users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        return "An account with this email already exists.";
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into Users table
    $stmt = $conn->prepare("INSERT INTO Users (FirstName, LastName, Age, Gender, Email, Password, Phone, City, Latitude, Longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt->execute([$firstname, $lastname, $age, $gender, $email, $hashedPassword, $phone, $city, $latitude, $longitude])) {
        return "Error creating user account.";
    }

    return "Registration successful! Please log in.";
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewLearner($_POST);
    echo $result;

    // Optionally, you can redirect to a login page or display the result on a new page
    // header("Location: signInLearner.html");
}
?>



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
    $profilePic = '../a';  // Default profile picture if none provided

    // Check if a picture was uploaded and process it
    if (!empty($_FILES['picture']['name'])) {
        $target_dir = "../uploads/";  // Directory where files will be saved
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            $profilePic = $target_file;  // Set the actual path of the uploaded file
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

    // Insert into Users table with the profile picture path
    $stmt = $conn->prepare("INSERT INTO users (username, FirstName, LastName, Email, Password, City, Photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $username, $firstname, $lastname, $email, $hashedPassword, $city, $profilePic);
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

    // Set session variable to keep the user logged in
    $_SESSION['user_id'] = $userId;  // This is the login indicator
    $_SESSION['user_role'] = 'partner';  // Optional, to manage user roles

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewPartner($_POST, $conn);
    if ($result === true) {
        $_SESSION['registration_success'] = "Signup successful!";
        header("Location: ../../HTML pages/HomePartner.php");  // Redirect to home page of the partner
        exit();
    } else {
        $_SESSION['registration_error'] = $result;
        header("Location: ../../HTML pages/SignUpPartner.php");  // Redirect back to the signup page if there's an error
        exit();
    }
}

$conn->close();
?>


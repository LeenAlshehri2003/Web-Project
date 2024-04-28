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
      // Initialize filename variable for cases where the user doesn't upload a new photo
      $filename = '';
      // Handle file upload
  if (!empty($_FILES["photo"]["name"])) {
      $targetDir = "../img/Partners images/";
      $fileName = basename($_FILES["photo"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  
      // Specify allowed file types
      $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
      if (in_array(strtolower($fileType), $allowTypes)) {
          // Upload file to the server
          if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
              $filename = $fileName; // Use this filename for updating the DB record
          } else {
              echo "Sorry, there was an error uploading your file.";
              $filename = ''; // Set to empty if the file upload fails
          }
      } else {
          echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
          $filename = ''; // Set to empty if the file type is not allowed
      }
  } else {
      // If no file is selected, keep the current profile picture
      // You can fetch the current profile picture filename from the database if needed
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
    $stmt = $conn->prepare("INSERT INTO users (username, FirstName, LastName, Email, Password, City, Photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $username, $firstname, $lastname, $email, $hashedPassword, $city, $filename);
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
        $_SESSION['registration_success'] = "Signup successful!";  // Set session variable for success message
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

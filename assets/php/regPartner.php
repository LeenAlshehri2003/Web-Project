<?php
session_start();
require 'db.php';  // Make sure this path is correct

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
   // $defaultPic = '../assets/img/DefaultProfilePic.jpg';  // Default profile picture if none provided
   // $filename = $defaultPic;  // Use default if no picture is uploaded



    $userImage = $_FILES['photo'];
    $imageName = $userImage['name'];
    if ($imageName == "")
    $imageName = "DefaultProfilePic.jpg";

    $fileTmpName = $userImage['tmp_name'];
    $fileNewName = "../img/Partners images/".$imageName;
    $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
  

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT username, Email FROM Users WHERE username = ? OR Email = ?");
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    if ($stmt->fetch()) {
        return "An account with this username or email already exists.";
    }
    $stmt->close();

    // Hash the password and insert into Users table
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, FirstName, LastName, Email, Password, City, Photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $username, $firstname, $lastname, $email, $hashedPassword, $city, $imageName);
    if (!$stmt->execute()) {
        return "Error creating user account: " . $stmt->error;
    }
    $userId = $conn->insert_id;
    $stmt->close();

    // Insert into Partners table
    $stmt = $conn->prepare("INSERT INTO partners (PartnerID, Bio, Age, Gender, Phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('isiss', $userId, $bio, $age, $gender, $phone);
    if (!$stmt->execute()) {
        return "Error registering partner: " . $stmt->error;
    }
    $stmt->close();

    // Insert into userlanguages if languages are selected
    if (!empty($formData['languages'])) {
        $insertLanguage = $conn->prepare("INSERT INTO userlanguages (UserID, LanguageID, ProficiencyLevel, IsNative) VALUES (?, ?, NULL, 1)");
        foreach ($formData['languages'] as $languageID) {
            $insertLanguage->bind_param("ii", $userId, $languageID);
            if (!$insertLanguage->execute()) {
                echo "Error inserting language: " . $insertLanguage->error;
                $insertLanguage->close();
                return false;
            }
        }
        $insertLanguage->close();
    }

    // Set session variables to keep the user logged in
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_role'] = 'partner';
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = registerNewPartner($_POST, $conn);
    if ($result === true) {
        $_SESSION['registration_success'] = "Signup successful!";
        header("Location: ../../HTML pages/HomePartner.php");  // Redirect to home page
        exit();
    } else {
        $_SESSION['registration_error'] = $result;
        header("Location: ../../HTML pages/SignUpPartner.php");
        exit();
    }
}

$conn->close();
?>

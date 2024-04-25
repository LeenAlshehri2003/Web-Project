<?php
session_start();
require 'db.php';  // Ensure this path is correct for your database connection script

// Redirect if not logged in
if (!isset($_SESSION['partnerID'])) {
    die('User must be logged in '); // Redirect to login page
    exit;
}

$partnerID = $_SESSION['partnerID'];

// Initialize variables to store data
$firstName = $lastName = $email = $city = $username = "";
$age = 0;
$gender = $phone = $bio = "";
$sessionPrice = 0.00;

// Fetch all languages
$languagesResult = $conn->query("SELECT LanguageID, LanguageName FROM languages");
$languages = $languagesResult->fetch_all(MYSQLI_ASSOC);

// Variables to store selected languages
$selectedLanguages = [];

// Retrieve existing user and partner information
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Fetch user details
    $userQuery = $conn->prepare("SELECT FirstName, LastName,  City FROM users WHERE UserID = ?");
    $userQuery->bind_param("i", $partnerID);
    $userQuery->execute();
    $userResult = $userQuery->get_result();
    if ($userRow = $userResult->fetch_assoc()) {
        $firstName = $userRow['FirstName'];
        $lastName = $userRow['LastName'];
        $city = $userRow['City'];
    }
    $userQuery->close();

    // Fetch partner details
    $partnerQuery = $conn->prepare("SELECT Age, Gender, Phone, Bio, SessionPrice FROM partners WHERE PartnerID = ?");
    $partnerQuery->bind_param("i", $partnerID);
    $partnerQuery->execute();
    $partnerResult = $partnerQuery->get_result();
    if ($partnerRow = $partnerResult->fetch_assoc()) {
        $age = $partnerRow['Age'];
        $gender = $partnerRow['Gender'];
        $phone = $partnerRow['Phone'];
        $bio = $partnerRow['Bio'];
        $sessionPrice = $partnerRow['SessionPrice'];
    }
    $partnerQuery->close();

    // Fetch selected languages
    $langQuery = $conn->prepare("SELECT LanguageID FROM userlanguages WHERE UserID = ?");
    $langQuery->bind_param("i", $partnerID);
    $langQuery->execute();
    $langResult = $langQuery->get_result();
    while ($langRow = $langResult->fetch_assoc()) {
        $selectedLanguages[] = $langRow['LanguageID'];
    }
    $langQuery->close();
}

// Handle form submission to update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Process photo upload if a file is provided
      if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        $validTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($photo['type'], $validTypes) && $photo['size'] < 5000000) { // 5MB limit
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($photo['name']);
            if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
                $photoPath = $conn->real_escape_string($uploadFile);
                $updatePhoto = $conn->prepare("UPDATE users SET Photo=? WHERE UserID=?");
                $updatePhoto->bind_param("si", $photoPath, $partnerID);
                $updatePhoto->execute();
                $updatePhoto->close();
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "Invalid file type or file too large.";
        }
    // Sanitize and assign new values from form
    $firstName = $conn->real_escape_string($_POST['FirstName']);
    $lastName = $conn->real_escape_string($_POST['LastName']);
    $email = $conn->real_escape_string($_POST['Email']);
    $city = $conn->real_escape_string($_POST['City']);
    $username = $conn->real_escape_string($_POST['Username']);
    $age = intval($_POST['Age']);
    $gender = $conn->real_escape_string($_POST['Gender']);
    $phone = $conn->real_escape_string($_POST['Phone']);
    $bio = $conn->real_escape_string($_POST['Bio']);
    $sessionPrice = floatval($_POST['SessionPrice']);

    // Update user details
    $updateUser = $conn->prepare("UPDATE users SET FirstName=?, LastName=?, Email=?, City=?, username=? WHERE UserID=?");
    $updateUser->bind_param("sssssi", $firstName, $lastName, $email, $city, $username, $partnerID);
    $updateUser->execute();
    $updateUser->close();

    // Update partner details
    $updatePartner = $conn->prepare("UPDATE partners SET Age=?, Gender=?, Phone=?, Bio=?, SessionPrice=? WHERE PartnerID=?");
    $updatePartner->bind_param("isssdi", $age, $gender, $phone, $bio, $sessionPrice, $partnerID);
    $updatePartner->execute();
    $updatePartner->close();

    // Update languages
    $deleteLanguages = $conn->prepare("DELETE FROM userlanguages WHERE UserID=?");
    $deleteLanguages->bind_param("i", $partnerID);
    $deleteLanguages->execute();
    $deleteLanguages->close();

    $insertLanguage = $conn->prepare("INSERT INTO userlanguages (UserID, LanguageID) VALUES (?, ?)");
    foreach ($_POST['languages'] as $languageID) {
        $insertLanguage->bind_param("ii", $partnerID, $languageID);
        $insertLanguage->execute();
    }
    $insertLanguage->close();
}

    // Redirect to a success page
   // header('Location: profile_updated_successfully.php');
   // exit;
}
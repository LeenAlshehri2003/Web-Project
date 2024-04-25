<?php
session_start();
require 'db.php';  // Ensure this path is correct for your database connection script

// Redirect if not logged in
//if (!isset($_SESSION['user_ID'])) {
 //   die('User must be logged in '); // Redirect to login page
 //   exit;
//}

$partnerID = 1;

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
    
    // Initialize filename variable for cases where the user doesn't upload a new photo
    $filename = '';
      // Handle file upload
      if (!empty($_FILES["profilePic"]["name"])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["profilePic"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Specify allowed file types
        $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array(strtolower($fileType), $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $targetFilePath)) {
                $filename = $fileName; // Use this filename for updating the DB record
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
        }
    }
    // Sanitize and assign new values from form
    $firstName = $conn->real_escape_string($_POST['FirstName']);
    $lastName = $conn->real_escape_string($_POST['LastName']);
    $city = $conn->real_escape_string($_POST['City']);
    $age = intval($_POST['Age']);
    $gender = $conn->real_escape_string($_POST['Gender']);
    $phone = $conn->real_escape_string($_POST['Phone']);
    $bio = $conn->real_escape_string($_POST['Bio']);
    $password = $conn->real_escape_string($_POST['NewPass']);
    $sessionPrice = floatval($_POST['SessionPrice']);

    // Update user details
    $updateUser = $conn->prepare("UPDATE users SET FirstName=?, LastName=?,Password=?, City=? WHERE UserID=?");
    $updateUser->bind_param("ssssi", $firstName, $lastName, $password, $city, $partnerID);
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
//header('Location: ..../HTML pages/ProfilePage-LanguagePartner.php');
   // exit;

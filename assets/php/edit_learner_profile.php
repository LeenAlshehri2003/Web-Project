<?php
session_start();
require 'db.php'; // Ensure this path is correct for your database connection script

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
      die('User must be logged in '); // Redirect to login page
    header('Location: ../../HTML pages/SignInLearner.php');
    exit;
}

$learnerID =$_SESSION['user_id']; // Assuming the user's ID is stored in the session under 'UserID'

// Initialize variables to store learner data
$firstName = $lastName = $city = $currentPass = $photo =  "";


// Retrieve existing learner information
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $learnerQuery = $conn->prepare("
        SELECT u.FirstName, u.LastName, u.City, u.Password, u.Photo, l.Location
        FROM users u
        INNER JOIN learners l ON u.UserID = l.LearnerID
        WHERE u.UserID = ?");
    $learnerQuery->bind_param("i", $learnerID);
    $learnerQuery->execute();
    $learnerResult = $learnerQuery->get_result();
    if ($learnerRow = $learnerResult->fetch_assoc()) {
        $firstName = $learnerRow['FirstName'];
        $lastName = $learnerRow['LastName'];
        $city = $learnerRow['City'];
        $currentPass = $learnerRow['Password'];
        $photo = $learnerRow['Photo'];
        $location = $learnerRow['Location'];  // Added line to retrieve location
    }
    $learnerQuery->close();
}
// Handle form submission to update learner data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve geolocation data from the form


// You might want to save these as a single field in the database
   $location =  $conn->real_escape_string($_POST['Location']);
    $firstName = $conn->real_escape_string($_POST['FirstName']);
    $lastName = $conn->real_escape_string($_POST['LastName']);
    $city = $conn->real_escape_string($_POST['City']);
    $NewPass = $conn->real_escape_string($_POST['NewPass']); // Assume hashing occurs later
    $hashedPassword = password_hash($NewPass, PASSWORD_DEFAULT);
    

    // Handle photo upload
 
    $userImage = $_FILES['photo'];
$imageName = $userImage['name'];
if ($imageName == "")
    $imageName = "DefaultProfilePic.jpg";

    $fileTmpName = $userImage['tmp_name'];
    $fileNewName = "../img/".$imageName;
    $uploaded = move_uploaded_file($fileTmpName,$fileNewName);


    // Update user details
    $updateUser = $conn->prepare("UPDATE users SET FirstName=?, LastName=?, Password=?, City=?, Photo=? WHERE UserID=?");
    $updateUser->bind_param("sssssi", $firstName, $lastName, $hashedPassword, $city, $imageName, $learnerID);
    $updateUser->execute();
    $updateUser->close();

    
    // Update location in learners table
    $updateLearner = $conn->prepare("UPDATE learners SET Location=? WHERE LearnerID=?");
    $updateLearner->bind_param("si", $location, $learnerID);
    $updateLearner->execute();
    $updateLearner->close();

    // Redirect to a success page or perform additional actions
    header('Location: ../../HTML pages/ProfilePage-LanguageLearner.php');
    exit;
}

?>
<?php
// Database connection variables
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_username';
$password = 'your_password';
$dsn = "mysql:host=$host;dbname=$dbname";

// Establish a database connection
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Check if it's a post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Insert request into database
    $sql = "INSERT INTO requests (proficiency, partner, sessionDate, sessionTime, duration, statusUpdate) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    $proficiency = $_POST['Proficiency'];
    $partner = $_POST['educatorSelect'];
    $sessionDate = $_POST['dob'];
    $sessionTime = $_POST['Time']; // Ensure this matches your form field's name attribute
    $duration = $_POST['Duration'];
    $statusUpdate = isset($_POST['Status']) ? 1 : 0; // Assuming a binary 1/0 for simplicity

    $stmt->execute([$proficiency, $partner, $sessionDate, $sessionTime, $duration, $statusUpdate]);

    echo "Request added successfully.";
}
?>
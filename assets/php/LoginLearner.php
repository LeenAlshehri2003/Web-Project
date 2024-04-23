<?php
require_once 'db.php';  // Ensure this points to your actual database connection script

session_start();
// Initialize database connection
$db = new Database();
$conn = $db->getConnection();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $conn = getDBConnection();  // Connect to the database

    // Prepare SQL statement to fetch the user and learner details
    $stmt = $conn->prepare("SELECT Users.UserID, Users.Password, Learners.LearnerID
                            FROM Users
                            JOIN Learners ON Users.UserID = Learners.LearnerID
                            WHERE Users.Username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['learner_id'] = $user['LearnerID'];  // Store the LearnerID in session

            header("Location: HomeLearner.html");  // Redirect to the learner home page
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that username.";
    }
} else {
    echo "Please fill in the form to log in.";
}
?>

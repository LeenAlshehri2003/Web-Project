<?php
session_start();
require 'db.php';  // Ensure the path to your database connection script is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT UserID, Password FROM users
        JOIN learners ON users.UserID = learners.LearnerID 
                                WHERE users.Username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['UserID'];
                header("Location: HomeLearner.html");  // Redirect to home page on successful login
                exit();
            } else {
                $_SESSION['login_error'] = "Invalid password. Please try again.";
            }
        } else {
            $_SESSION['login_error'] = "No account was found with these credentials.";
        }
        $stmt->close();
    } else {
        $_SESSION['login_error'] = "Please provide both username and password.";
    }

    header("Location: ../../HTML pages/SignInLearner.php"); // Redirect back to the sign-in page on failure
    exit();
}

$conn->close();
?>

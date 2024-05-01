<?php
session_start();
require 'db.php';  // Make sure this path is correct for your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        // First validate username and password in the users table
        $stmt = $conn->prepare("SELECT UserID, Password FROM users WHERE Username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                // Password is correct, now check if this UserID is a LearnerID in the learners table
                $userID = $user['UserID'];
                $stmt = $conn->prepare("SELECT LearnerID FROM learners WHERE LearnerID = ?");
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    // User is confirmed as a learner
                    $_SESSION['user_id'] = $userID;
                    header("Location: ../../HTML pages/HomeLearner.php");  // Redirect to the learner's home page
                    exit();
                } else {
                    // User exists but is not registered as a learner
                    $_SESSION['login_error'] = "Access denied: You are not registered as a learner.";
                }
            } else {
                // Incorrect password provided
                $_SESSION['login_error'] = "Invalid password. Please try again.";
            }
        } else {
            // No user found with the provided username
            $_SESSION['login_error'] = "No account was found with these credentials.";
        }
        $stmt->close();
    } else {
        // Username or password fields were empty
        $_SESSION['login_error'] = "Please provide both username and password.";
    }

    header("Location: ../../HTML pages/SignInLearner.php"); // Redirect back to the sign-in page on failure
    exit();
}

$conn->close();
?>

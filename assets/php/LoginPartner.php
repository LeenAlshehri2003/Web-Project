<?php
session_start();
require 'db.php';  // Make sure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT users.UserID, users.Password
                                FROM users 
                                JOIN partners ON users.UserID = partners.PartnerID 
                                WHERE users.Username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['partner_id'] = $user['PartnerID'];  
                header("Location: ../../HTML pages/HomePartner.php");  // Redirect to partner's home page on successful login
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

    header("Location: ../../HTML pages/SignInPartner.php"); // Redirect back to the partner sign-in page on failure
    exit();
}

$conn->close();
?>

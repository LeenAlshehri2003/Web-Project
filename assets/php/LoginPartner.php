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

    // Prepare SQL statement to fetch the user and partner details
    $stmt = $conn->prepare("SELECT Users.UserID, Users.Password, Partners.PartnerID
                            FROM Users
                            JOIN Partners ON Users.UserID = Partners.PartnerID
                            WHERE Users.Username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['partner_id'] = $user['PartnerID'];  // Store the PartnerID in session

            header("Location: HomePartner.html");  // Redirect to the partner home page
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

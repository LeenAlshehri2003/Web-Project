<?php
require_once 'db.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: SignInLearner.php"); // Redirect them to the login page if not logged in
    exit('User not logged in.'); // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];


function submitReview($formData, $conn) {
    $comment = htmlspecialchars($formData['comment']);
    $rating = htmlspecialchars($formData['rating']);
    $sessionID = htmlspecialchars($formData['sessionID']);

    // Prepare the SQL statement to insert the review
    $stmt = $conn->prepare("INSERT INTO reviews (SessionID, Rating, Comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $sessionID, $rating, $comment);

    if ($stmt->execute()) {
        return true; // Success: Review submitted
    } else {
        return false;
    }
}

/*if ($stmt->affected_rows > 0) {
    echo "Review submitted successfully!";
} else {
    echo "Failed to submit the review. Please try again.";
}*/



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = submitReview($_POST, $conn);
    if ($result === true) {
        $_SESSION['submission_success'] = "Review submitted successfully!";
        header("Location: ../../HTML pages/View sessions - Learner.php");
        exit();
    } else {
        $_SESSION['submission_error'] = $result;
        header("Location: ../../HTML pages/View sessions - Learner.php");
        exit();
    }
}




$conn->close();
?>



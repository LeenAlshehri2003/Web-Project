<?php
// Include database connection
require_once 'db.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}
$userId = $_SESSION['user_id'];

// Fetch requests from the database based on status
$status = $_GET['status']; // Get the status parameter from the URL

// Fetch requests from the database
$db = new Database();
$conn = $db->getConnection();

// Example query to fetch requests based on status
$sql = "SELECT lr.*, u.FirstName AS LearnerFirstName, u.LastName AS LearnerLastName
        FROM languagerequests lr
        JOIN learners l ON lr.LearnerID = l.LearnerID
        JOIN users u ON l.LearnerID = u.UserID
        WHERE lr.Status = '$status'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output each request component dynamically
        echo '<div class="request-component ' . $row['Status'] . '">';
        echo '<img class="profile-picture" alt="profile-picture" src="../assets/img/Reviewers/Saudi man with mobile SEO.jpeg">';
        echo '<div class="request-details-body">';
        echo '<p><strong>Learner Name:</strong> ' . $row['LearnerFirstName'] . ' ' . $row['LearnerLastName'] . '</p>';
        echo '<p><strong>Time till request expires:</strong> - </p>';
        echo '<div class="status-grid">';
        echo '<p><strong>Status:</strong> ' . $row['Status'] . '</p>';
        echo '<img alt="' . $row['Status'] . '" class="request-status-img" src="../assets/img/icon/check-circle-icon-original.svg">';
        echo '</div>';
        echo '</div>';
        echo '<div class="request-actions">';
        echo '<a href="Request-Details-' . $row['LearnerFirstName'] . '.html" class="theme_btn free_btn">view details</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>

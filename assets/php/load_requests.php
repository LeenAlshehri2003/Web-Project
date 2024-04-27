<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
//if (!isset($_SESSION['learner_id'])) {
//    exit('User not logged in.');  // Proper handling for not logged-in users
//}

$userId = 3;

// Assuming $conn is already an established database connection
$sql = "SELECT lr.*, u.Photo AS PartnerPhoto, l.LanguageName
        FROM languagerequests lr
        INNER JOIN users u ON lr.PartnerID = u.UserID
        INNER JOIN languages l ON lr.LanguageID = l.LanguageID
        WHERE lr.LearnerID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$requests = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Split the PreferredSchedule into date and time
        $scheduleDateTime = new DateTime($row['PreferredSchedule']);
        $row['PreferredDate'] = $scheduleDateTime->format('Y-m-d');
        $row['PreferredTime'] = $scheduleDateTime->format('H:i:s');

        // Now $row includes PreferredDate and PreferredTime separately
        $requests[] = $row;
    }
}

// Close your database connection if needed
$conn->close();

// Now you return $requests to be used directly in HTML
return $requests;
?>
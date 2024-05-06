<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();



$userId = $_SESSION['user_id'];

// Assuming $conn is already an established database connection
$sql = "SELECT lr.*, u.Photo AS PartnerPhoto, u.FirstName AS PartnerFirstName, u.LastName AS PartnerLastName, l.LanguageName, p.SessionPrice
        FROM languagerequests lr
        INNER JOIN users u ON lr.PartnerID = u.UserID
        INNER JOIN languages l ON lr.LanguageID = l.LanguageID
        INNER JOIN partners p ON lr.PartnerID = p.PartnerID
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

        // Calculate session price
        $sessionPrice = $row['SessionPrice'] * $row['SessionDuration'];
        $row['SessionPrice'] = $sessionPrice;

        // Now $row includes PartnerFirstName, PartnerLastName, PreferredDate, PreferredTime, and SessionPrice
        $requests[] = $row;
    }
}

// Close your database connection if needed
$conn->close();

// Now you return $requests to be used directly in HTML
return $requests;
?>
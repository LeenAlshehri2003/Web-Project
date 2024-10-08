<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();




$userId = $_SESSION['user_id'];

// SQL query to fetch general partner info and only language names
$stmt = $conn->prepare("
    SELECT u.FirstName, u.LastName, u.Email, u.City, u.Photo,
           p.Age, p.Gender, p.Phone, p.Bio,
           l.LanguageName
    FROM Users u
    JOIN Partners p ON u.UserID = p.PartnerID
    LEFT JOIN UserLanguages ul ON u.UserID = ul.UserID
    LEFT JOIN Languages l ON ul.LanguageID = l.LanguageID
    WHERE u.UserID = ?");
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$partnerData = [];
$partnerData['Languages'] = [];

while ($row = $result->fetch_assoc()) {
    if (empty($partnerData['FirstName'])) {  // Populate general info if not already done
        $partnerData['FirstName'] = $row['FirstName'];
        $partnerData['LastName'] = $row['LastName'];
        $partnerData['Email'] = $row['Email'];
        $partnerData['City'] = $row['City'];
        $partnerData['Photo'] = $row['Photo'];
        $partnerData['Age'] = $row['Age'];
        $partnerData['Gender'] = $row['Gender'];
        $partnerData['Phone'] = $row['Phone'];
        $partnerData['Bio'] = $row['Bio'];
        $partnerData['userId'] = $userId;
    }
    if (!empty($row['LanguageName'])) {  // Add language names
        $partnerData['Languages'][] = $row['LanguageName'];
    }
}

$conn->close();
?>

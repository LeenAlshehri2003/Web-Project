<?php
require_once 'db.php';  // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    exit('User not logged in.');  // Proper handling for not logged-in users
}

$userId = $_SESSION['user_id'];

// SQL query to fetch partners data
$sqlPartners = "SELECT * FROM partners";
$resultPartners = $conn->query($sqlPartners);

// Check if the query was successful
if ($resultPartners->num_rows > 0) {
    // Process the results
    while($rowPartners = $resultPartners->fetch_assoc()) {
        // Output partner data
        echo "Name: " . $rowPartners["name"]. " - Image: " . $rowPartners["image_url"]. " - Description: " . $rowPartners["description"]. "<br>";
    }
} else {
    echo "0 results";
}

// SQL query to fetch general partner info and only language names
$stmt = $conn->prepare("
    SELECT u.FirstName, u.LastName, u.Email, u.City, u.Photo,
           p.Age, p.Gender, p.Phone, p.Bio,
           l.LanguageName
    FROM Users u
    JOIN Partners p ON u.UserID = p.UserID
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
    }
    if (!empty($row['LanguageName'])) {  // Add language names
        $partnerData['Languages'][] = $row['LanguageName'];
    }
}

$conn->close();
?>

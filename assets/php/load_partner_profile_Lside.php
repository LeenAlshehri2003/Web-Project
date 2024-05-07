<?php
require_once 'db.php';  // Ensure this points to your actual database connection script

// Retrieve partner ID from URL parameter
$partnerId = $_GET['partnerId'];

// SQL query to fetch partner info including languages and average rating
$stmt = $conn->prepare("
SELECT 
    u.UserID, u.FirstName, u.LastName, u.Email, u.City, u.Photo,
    p.Age, p.Gender, p.Phone, p.Bio, p.SessionPrice,
    l.LanguageName, COALESCE(ROUND(AVG(r.Rating), 2), 0) AS AverageRating
FROM 
    users u
JOIN 
    partners p ON u.UserID = p.PartnerID
LEFT JOIN 
    userlanguages ul ON u.UserID = ul.UserID
LEFT JOIN 
    languages l ON ul.LanguageID = l.LanguageID
LEFT JOIN 
    languagerequests lr ON p.PartnerID = lr.PartnerID
LEFT JOIN 
    reviews r ON lr.RequestID = r.RequestID
WHERE 
    u.UserID = ?
GROUP BY 
    u.UserID");

$stmt->bind_param('i', $partnerId);
$stmt->execute();
$result = $stmt->get_result();

$partnerData = [];
$partnerData['Languages'] = [];

while ($row = $result->fetch_assoc()) {
    if (empty($partnerData['UserID'])) {  // Populate user ID if not already done
        $partnerData['UserID'] = $row['UserID'];
    }
    if (empty($partnerData['FirstName'])) {  // Populate general info if not already done
        $partnerData['partnerid'] = $partnerId;
        $partnerData['FirstName'] = $row['FirstName'];
        $partnerData['LastName'] = $row['LastName'];
        $partnerData['Email'] = $row['Email'];
        $partnerData['City'] = $row['City'];
        $partnerData['Photo'] = $row['Photo'];
        $partnerData['Age'] = $row['Age'];
        $partnerData['Gender'] = $row['Gender'];
        $partnerData['Phone'] = $row['Phone'];
        $partnerData['Bio'] = $row['Bio'];
        $partnerData['SessionPrice'] = $row['SessionPrice']; // Add session price
        $partnerData['AverageRating'] = $row['AverageRating'];
    }
    if (!empty($row['LanguageName'])) {  // Add language names
        $partnerData['Languages'][] = $row['LanguageName'];
    }
}

// Calculate total reviews
$stmt = $conn->prepare("
SELECT COUNT(*) AS TotalReviews
FROM languagerequests lr
LEFT JOIN reviews r ON lr.RequestID = r.RequestID
WHERE lr.PartnerID = ?");
$stmt->bind_param('i', $partnerId);
$stmt->execute();
$totalReviewsResult = $stmt->get_result();
$totalReviewsRow = $totalReviewsResult->fetch_assoc();
$partnerData['TotalReviews'] = $totalReviewsRow['TotalReviews'];

$conn->close();

?>

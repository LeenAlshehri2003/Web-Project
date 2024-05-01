<?php
// Enable CORS (Cross-Origin Resource Sharing)
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, and OPTIONS requests
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); // Allow specified headers
session_start();

require_once 'db.php';  // Ensure this points to your actual database connection script

//
//if (!isset($_SESSION['user_ID'])) {
 // die('User must be logged in '); // Redirect to login page
//header('Location: ../../HTML pages/SignInLearner.php');
 // exit;
//}

// Initialize an array to store partners data
$partners = [];

// SQL query to fetch partners data along with the average rating and total reviews count
$sqlPartners = "SELECT partners.*, 
                    CONCAT(users.FirstName, ' ', users.LastName) AS FullName,
                    IFNULL(ROUND(AVG(reviews.Rating), 2), 0) AS AverageRating,
                    COUNT(reviews.ReviewID) AS TotalReviews,
                    users.Photo AS Photo,
                    partners.SessionPrice,
                    GROUP_CONCAT(languages.LanguageID) AS LanguageID,
                    GROUP_CONCAT(languages.LanguageName SEPARATOR ', ') AS Languages
                FROM partners
                JOIN users ON partners.PartnerID = users.UserID
                LEFT JOIN sessions ON partners.PartnerID = sessions.PartnerID
                LEFT JOIN reviews ON sessions.SessionID = reviews.SessionID
                LEFT JOIN userlanguages ON partners.PartnerID = userlanguages.UserID
                LEFT JOIN languages ON userlanguages.LanguageID = languages.LanguageID
                GROUP BY partners.PartnerID";

$resultPartners = $conn->query($sqlPartners);

// Check if the query was successful
if ($resultPartners->num_rows > 0) {
    // Process the results
    while($rowPartners = $resultPartners->fetch_assoc()) {
        // Push partner data into the array
        $partners[] = $rowPartners;
    }
}

// Close the database connection
$conn->close();

// Output partners data as JSON
echo json_encode(['partners' => $partners]);
?>

<?php
require_once 'db.php'; // Ensure this points to your actual database connection script
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: SignInLearner.php"); // Redirect them to the login page if not logged in
    exit('User not logged in.'); // Proper handling for not logged-in users
}

// Retrieve partners data from the database
$sqlPartners =  $conn->prepare("SELECT partners.*, 
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
                GROUP BY partners.PartnerID");
$sqlPartners->execute();
$result = $sqlPartners->get_result();

// Initialize an array to store partner sessions
$partners = [];

while ($rowPartners = $result->fetch_assoc()) {
    // Process each partner's data
    $partnerID = $rowPartners['PartnerID'];
    $fullName = $rowPartners['FullName'];
    $averageRating = $rowPartners['AverageRating'];
    $totalReviews = $rowPartners['TotalReviews'];
    $photo = $rowPartners['Photo'];
    $sessionPrice = $rowPartners['SessionPrice'];
    $languageID = $rowPartners['LanguageID'];
    $languages = $rowPartners['Languages'];

    // Construct partner session array
    $partnerSession = array(
        'PartnerID' => $partnerID,
        'FullName' => $fullName,
        'AverageRating' => $averageRating,
        'TotalReviews' => $totalReviews,
        'Photo' => $photo,
        'SessionPrice' => $sessionPrice,
        'LanguageID' => $languageID,
        'Languages' => $languages
    );

    // Add partner session to partners array
    $partners[] = $partnerSession;
}

// Close the prepared statement
$sqlPartners->close();
$conn->close();
?>

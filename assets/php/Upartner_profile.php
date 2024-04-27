<?php
// Enable CORS (Cross-Origin Resource Sharing)
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, and OPTIONS requests
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); // Allow specified headers
session_start();
require_once 'db.php';  // Ensure this points to your actual database connection script

// Initialize an array to store partner data
$partnerData = [];

// Redirect if not logged in
//if (!isset($_SESSION['UserID'])) {
     //   die('User must be logged in '); // Redirect to login page
   // header('Location: ../../HTML pages/SignInLearner.php');
  //  exit;
//}
// Check if a partner ID is provided in the request
if (isset($_GET['partnerId']) && is_numeric($_GET['partnerId'])) {
    $partnerID = (int)$_GET['partnerId']; 
    
    // Prepare the SQL query with a placeholder for the parameter
    $sql = "SELECT p.*, 
    u.FirstName, 
    u.LastName, 
    u.Email, 
    u.City,
    IFNULL(ROUND(AVG(r.Rating), 2), 0) AS AverageRating, 
    COUNT(r.ReviewID) AS TotalReviews, 
    u.Photo AS Photo, 
    GROUP_CONCAT(DISTINCT l.LanguageID) AS LanguageID, 
    GROUP_CONCAT(DISTINCT l.LanguageName SEPARATOR ', ') AS Languages 
FROM partners p 
LEFT JOIN users u ON p.PartnerID = u.UserID 
LEFT JOIN sessions s ON p.PartnerID = s.PartnerID 
LEFT JOIN reviews r ON s.SessionID = r.SessionID 
LEFT JOIN userlanguages ul ON p.PartnerID = ul.UserID 
LEFT JOIN languages l ON ul.LanguageID = l.LanguageID 
WHERE p.PartnerID = ? 
GROUP BY p.PartnerID";


    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind the parameter to the placeholder
        $stmt->bind_param("i", $partnerID); // 'i' indicates integer data type, adjust if needed
        
        // Execute the statement
        if ($stmt->execute()) {
            // Get the result
            $result = $stmt->get_result();
            
            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Fetch partner data
                $partnerData = $result->fetch_assoc();
            } else {
                // If no partner data was found, set an error message
                $partnerData['error'] = "Partner not found";
            }
        } else {
            // If there was an error executing the query, set an error message
            $partnerData['error'] = "Error executing query: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // If there was an error preparing the statement, set an error message
        $partnerData['error'] = "Error preparing statement: " . $conn->error;
    }
} else {
    // If no partner ID is provided or it's invalid, return an error message
    $partnerData['error'] = "Invalid or missing partner ID";
}

// Output partner data as JSON
echo json_encode(['partnerData' => $partnerData]);
?>

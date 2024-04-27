<?php
session_start();
// Enable CORS (Cross-Origin Resource Sharing)
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, and OPTIONS requests
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); // Allow specified headers

require_once 'db.php';  // Ensure this points to your actual database connection script

// Redirect if not logged in
//if (!isset($_SESSION['UserID'])) {
     //   die('User must be logged in '); // Redirect to login page
   // header('Location: ../../HTML pages/SignInLearner.php');
  //  exit;
//}

// Initialize an array to store learner data
$learnerData = [];

// Check if a learner ID is provided in the request
if (isset($_GET['learnerId']) && is_numeric($_GET['learnerId'])) {
    $learnerID = (int)$_GET['learnerId']; 
    
    // Prepare the SQL query to fetch learner information along with languages and proficiency levels
    $sql = "SELECT u.FirstName, 
                   u.LastName, 
                   u.Email, 
                   u.Photo, 
                   u.City, 
                   u.UserName,
                   GROUP_CONCAT(CONCAT_WS(':', l.LanguageName, ul.ProficiencyLevel) SEPARATOR ',') AS Languages
            FROM users u 
            JOIN learners lr ON u.UserID = lr.LearnerID 
            LEFT JOIN userlanguages ul ON lr.LearnerID = ul.UserID
            LEFT JOIN languages l ON ul.LanguageID = l.LanguageID
            WHERE lr.LearnerID = ?
            GROUP BY u.UserID";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind the parameter to the placeholder
        $stmt->bind_param("i", $learnerID); // 'i' indicates integer data type, adjust if needed
        
        // Execute the statement
        if ($stmt->execute()) {
            // Get the result
            $result = $stmt->get_result();
            
            // Check if any rows were returned
            if ($result->num_rows > 0) {
                // Fetch learner data
                $learnerData = $result->fetch_assoc();
            } else {
                // If no learner data was found, set an error message
                $learnerData['error'] = "Learner not found";
            }
        } else {
            // If there was an error executing the query, set an error message
            $learnerData['error'] = "Error executing query: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // If there was an error preparing the statement, set an error message
        $learnerData['error'] = "Error preparing statement: " . $conn->error;
    }
} else {
    // If no learner ID is provided or it's invalid, return an error message
    $learnerData['error'] = "Invalid or missing learner ID";
}

// Output learner data as JSON
echo json_encode(['learnerData' => $learnerData]);
?>

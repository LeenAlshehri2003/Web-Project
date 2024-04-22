<?php
// Enable CORS (Cross-Origin Resource Sharing)
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Allow GET, POST, and OPTIONS requests
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization"); // Allow specified headers

require_once 'db.php';  // Ensure this points to your actual database connection script

// Initialize an array to store partner data
$partnerData = [];

// Check if a partner ID is provided in the request
if (isset($_GET['partner_id'])) {
    $partnerID = $_GET['partner_id'];

    // SQL query to fetch partner data by ID
    $sql = "SELECT * FROM partners WHERE PartnerID = $partnerID";
    
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // Fetch partner data
        $partnerData = $result->fetch_assoc();
    }
}

// Close the database connection
$conn->close();

// Output partner data as JSON
echo json_encode(['partnerData' => $partnerData]);
?>

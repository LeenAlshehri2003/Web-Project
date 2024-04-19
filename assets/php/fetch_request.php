<?php
include_once('db.php'); // Database connection file
$db = new Database();
$conn = $db->getConnection();

// Get request ID from AJAX call
$requestId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($requestId > 0) {
    $sql = "SELECT * FROM languagerequests WHERE RequestID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $requestId);
    $stmt->execute();
    $result = $stmt->get_result();
    $requestData = $result->fetch_assoc();
    echo json_encode($requestData);
    $stmt->close();
} else {
    echo json_encode(['error' => 'Invalid request ID']);
}

$conn->close();
?>
<?php
include 'db.php'; // Database connection

if (isset($_POST['partnerId'])) {
    $partnerId = intval($_POST['partnerId']);
    $query = "SELECT SessionPrice FROM partners WHERE PartnerID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $partnerId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        echo json_encode(['price' => $row['SessionPrice']]);
    } else {
        echo json_encode(['price' => 0]); // Default price if not found
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Partner ID not provided']);
}
?>
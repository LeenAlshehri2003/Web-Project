<?php
include 'db.php'; // Ensure the database connection is included

$options = ""; // Initialize empty options string

// Updated query to fetch partners (who are users) and the languages they can teach
$query = "SELECT p.PartnerID, CONCAT(u.FirstName, ' ', u.LastName) AS PartnerName, l.LanguageName, l.LanguageID
          FROM partners p
          JOIN users u ON p.PartnerID = u.UserID
          JOIN userlanguages ul ON u.UserID = ul.UserID
          JOIN languages l ON ul.LanguageID = l.LanguageID";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Combine PartnerID and LanguageID in the value attribute
        $options .= "<option value='" . $row['PartnerID'] . "-" . $row['LanguageID'] . "'>" . htmlspecialchars($row['PartnerName']) . " - " . htmlspecialchars($row['LanguageName']) . "</option>";
    }
} else {
    $options .= "<option>No partners available</option>";
}

$conn->close();
echo $options;
?>
<?php
// Include your database connection script
require_once 'db.php';

// Retrieve the status from the URL parameter
$status = $_GET['status'] ?? '';

// Validate the status (to prevent SQL injection)
$statuses = ['Pending', 'Accepted', 'Rejected'];
if (!in_array($status, $statuses)) {
    die("Invalid status.");
}

// Prepare SQL query to fetch requests based on status
$query = "SELECT lr.*, CONCAT(u.FirstName, ' ', u.LastName) AS FullName, u.Photo AS ProfilePicture, lr.SubmitDate
          FROM languagerequests lr
          INNER JOIN users u ON lr.LearnerID = u.UserID
          WHERE lr.Status = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $status);
$stmt->execute();

// Fetch data
$result = $stmt->get_result();

// Check if there are any requests
if ($result->num_rows > 0) {
    // Loop through each row and display request details
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="request-component">
            <img class="profile-picture" alt="profile-picture" src="../assets/img/Reviewers/<?php echo $row['ProfilePicture']; ?>">
            <div class="request-details-body">
                <p><strong>Learner Name:</strong> <?php echo $row['FullName']; ?></p>
                <?php if ($status === 'Pending') {
                    // Calculate time till expiration
                    $submitDate = strtotime($row['SubmitDate']);
                    $currentTime = time();
                    $expirationTime = $submitDate + 24 * 3600; // Calculate expiration time as 24 hours from submission time
                    $timeDiff = $expirationTime - $currentTime;
                    $hoursRemaining = max(round($timeDiff / 3600), 0); // Ensure the result is non-negative

                    if ($hoursRemaining == 0) {
                        echo "<p><strong>Time till request expires:</strong> Expired</p>";
                    } else {
                        echo "<p><strong>Time till request expires:</strong> $hoursRemaining hours</p>";
                    }
                } ?>
            </div>
        </div>
        <?php
    }
} else {
    echo "No requests found for status: $status";
}

// Close the prepared statement
$stmt->close();
?>

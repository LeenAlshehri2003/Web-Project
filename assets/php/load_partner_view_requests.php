<?php
// Set the timezone to Riyadh
date_default_timezone_set('Asia/Riyadh');

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
            <img class="profile-picture" alt="profile-picture" src="../assets/img/Partners images/<?php echo $row['ProfilePicture']; ?>">
            <div class="request-details-body">
                <p><strong>RequestNo#</strong> <?php echo $row['RequestID']; ?></p>
                <p><strong>Learner Name:</strong> <?php echo $row['FullName']; ?></p>
                <?php
                    if ($status === 'Pending') {
                        // Get the submit date and current date
                        $submitDate = strtotime($row['SubmitDate']);
                        // The time() function returns the current time in the number of seconds since the Unix Epoch (January 1 1970)
                        $currentTime = time();

                        // Calculate the difference in hours
                        $hoursDifference = floor(($currentTime - $submitDate) / 3600);

                        // Check if 24 hours have passed since submission
                        if ($hoursDifference >= 24) {
                            // Update status to 'Rejected' in the database
                            $requestID = $row['RequestID'];
                            $updateQuery = "UPDATE languagerequests SET Status = 'Rejected' WHERE RequestID = ?";
                            $updateStmt = $conn->prepare($updateQuery);
                            $updateStmt->bind_param("i", $requestID);
                            $updateStmt->execute();
                            $updateStmt->close();
                            
                            echo "<p><strong>Time till request expires:</strong> Expired</p>";
                        } else {
                            // Calculate remaining time until the request expires
                            $timeRemaining = strtotime('+24 hours', $submitDate) - $currentTime;
                            $hoursRemaining = floor($timeRemaining / 3600);
                            $minutesRemaining = floor(($timeRemaining % 3600) / 60);
                            echo "<p><strong>Time till request expires:</strong> $hoursRemaining hours and $minutesRemaining minutes</p>";
                        }
                    }
                    ?>
            </div>
            <div class="request-actions">
                <a href="partner_RequestDetails.php?request_id=<?php echo $row['RequestID']; ?>" class="theme_btn free_btn">view details</a>
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

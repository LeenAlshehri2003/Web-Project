<?php
// Assumes session start and database connection are already handled

if (isset($_GET['profile_id'], $_GET['profile_type'])) {
    $profile_id = $_GET['profile_id'];
    $profile_type = $_GET['profile_type'];

    // SQL to delete the user from the 'users' table
    $sql = "DELETE FROM users WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $profile_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Profile deleted successfully.'); window.location.href = '/main_page.php';</script>";
    } else {
        // Determine the profile page based on the type of profile
        $errorRedirectPage = ($profile_type === 'learner') ? '/profile_page_learner.php' : '/profile_page_partner.php';
        echo "<script>alert('Error deleting profile.'); window.location.href = '$errorRedirectPage';</script>";
    }
}
?>
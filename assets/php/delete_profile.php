<?php
include_once('db.php'); // Ensure this points to your database connection script
// Assumes session start and database connection are already handled
// Redirect if not logged in


if (isset($_GET['profile_id'], $_GET['profile_type'])) {
    $profile_id = $_GET['profile_id'];
    $profile_type = $_GET['profile_type'];

    // SQL to delete the user from the 'users' table
    $sql = "DELETE FROM users WHERE UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $profile_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
         // Check the profile type to decide the redirection path
         if ($profile_type === 'learner') {
            echo "<script>alert('Profile deleted successfully.'); window.location.href = '../../HTML pages/SignUpLearner.php';</script>";
        } else if ($profile_type === 'partner') {
            echo "<script>alert('Profile deleted successfully.'); window.location.href = '../../HTML pages/SignUpPartner.php';</script>";
        }
    } else {
        // Determine the profile page based on the type of profile
        $errorRedirectPage = ($profile_type === 'learner') ? '../../HTML pages/ProfilePage-LanguageLearner.php' : '../../HTML pages/ProfilePage-LanguagePartner.php';
        echo "<script>alert('Error deleting profile.'); window.location.href = '$errorRedirectPage';</script>";
    }
}
?>
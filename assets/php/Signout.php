<?php 
session_start();

if (isset($_SESSION['user_id'])) 
// Destroy the session.
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Out</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
// Using SweetAlert for a better-looking alert box
Swal.fire({
    title: 'Signed Out!',
    text: 'You have successfully signed out.',
    icon: 'success',
    confirmButtonText: 'OK'
}).then((result) => {
    if (result.value) {
        // Redirect to the landing page after clicking 'OK'
        window.location.href = '../../HTML pages/LandingPage.html';
    }
});
</script>
</body>
</html>

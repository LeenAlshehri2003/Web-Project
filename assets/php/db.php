<?php
$servername = "localhost"; //host
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP has no password
$dbname = "webproject"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 else {
   //echo "Connected successfully"; // You can uncomment this line for testing
 }

// Remember to close the connection when you're done with it,
// though it's not strictly necessary at the end of the script,
// as PHP automatically closes the connection when the script ends.
?>
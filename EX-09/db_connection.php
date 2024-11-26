<?php
// Database connection settings
$servername = "localhost";
$username = "root";  // Use your MySQL username
$password = "valli";      // Use your MySQL password
$dbname = "banking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>



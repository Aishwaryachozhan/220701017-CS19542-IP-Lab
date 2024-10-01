<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$event_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO bookings (user_id, event_id) VALUES ('$user_id', '$event_id')";
if ($conn->query($sql) === TRUE) {
    echo "Booking successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>



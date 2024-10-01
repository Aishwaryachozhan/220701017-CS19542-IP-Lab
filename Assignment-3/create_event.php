<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    $sql = "INSERT INTO events (title, description, date, time, location, price) VALUES ('$title', '$description', '$date', '$time', '$location', '$price')";
    if ($conn->query($sql) === TRUE) {
        echo "Event created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post">
    Title: <input type="text" name="title" required><br>
    Description: <textarea name="description" required></textarea><br>
    Date: <input type="date" name="date" required><br>
    Time: <input type="time" name="time" required><br>
    Location: <input type="text" name="location" required><br>
    Price: <input type="number" step="0.01" name="price" required><br>
    <input type="submit" value="Create Event">
</form>


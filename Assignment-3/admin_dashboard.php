<?php
session_start();
include 'db.php';

// Redirect to login if admin is not logged in
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch events
$events = $conn->query("SELECT * FROM events");
if (!$events) {
    echo "Error fetching events: " . $conn->error;
}

// Add new event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO events (title, description, date, time, location, price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $description, $date, $time, $location, $price);
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php"); // Redirect to dashboard to see updated events
        exit();
    } else {
        echo "Error adding event: " . $stmt->error;
    }
    $stmt->close();
}

// Delete event
if (isset($_GET['delete'])) {
    $event_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM events WHERE id = ?");
    $stmt->bind_param("i", $event_id);
    if ($stmt->execute()) {
        header("Location: admin_dashboard.php"); // Redirect to see updated events
        exit();
    } else {
        echo "Error deleting event: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Admin Dashboard</h2>

<h3>Add New Event</h3>
<form method="POST" action="">
    <input type="text" name="title" placeholder="Event Title" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <input type="text" name="location" placeholder="Location" required>
    <input type="number" name="price" placeholder="Price" required>
    <button type="submit" name="add_event">Add Event</button>
</form>

<h3>Manage Events</h3>
<table>
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Location</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while ($event = $events->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($event['title']); ?></td>
        <td><?php echo htmlspecialchars($event['date']); ?></td>
        <td><?php echo htmlspecialchars($event['time']); ?></td>
        <td><?php echo htmlspecialchars($event['location']); ?></td>
        <td><?php echo htmlspecialchars($event['price']); ?></td>
        <td>
            <a href="admin_dashboard.php?delete=<?php echo $event['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>

<a href="logout.php">Logout</a>

</body>
</html>




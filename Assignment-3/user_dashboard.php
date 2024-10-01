<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$bookings = $conn->query("SELECT events.title, events.date, events.time, events.location FROM bookings JOIN events ON bookings.event_id = events.id WHERE bookings.user_id='$user_id'");
?>

<h2>My Bookings</h2>
<table>
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Location</th>
    </tr>
    <?php while ($booking = $bookings->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $booking['title']; ?></td>
        <td><?php echo $booking['date']; ?></td>
        <td><?php echo $booking['time']; ?></td>
        <td><?php echo $booking['location']; ?></td>
    </tr>
    <?php } ?>
</table>



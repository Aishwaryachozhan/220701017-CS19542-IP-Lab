<?php
include 'db.php';
$events = $conn->query("SELECT * FROM events");
?>

<h2>Available Events</h2>
<?php while ($event = $events->fetch_assoc()) { ?>
    <div>
        <h3><?php echo $event['title']; ?></h3>
        <p><?php echo $event['description']; ?></p>
        <p>Date: <?php echo $event['date']; ?></p>
        <p>Location: <?php echo $event['location']; ?></p>
        <p>Price: <?php echo $event['price']; ?></p>
        <a href="book_event.php?id=<?php echo $event['id']; ?>">Book Now</a>
    </div>
<?php } ?>



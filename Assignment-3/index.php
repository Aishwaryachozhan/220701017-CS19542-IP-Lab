<?php session_start(); ?>

<h1>Welcome to the Event Management System</h1>

<?php if (isset($_SESSION['username'])) { ?>
    <p>Hello, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></p>
    <a href="events.php">View Events</a> | <a href="user_dashboard.php">My Bookings</a>
<?php } else { ?>
    <a href="login.php">Login</a> | <a href="register.php">Register</a> | <a href="admin_login.php">Admin Login</a>
<?php } ?>




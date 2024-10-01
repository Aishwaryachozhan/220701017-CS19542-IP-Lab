<?php
ob_start(); // Start output buffering
session_start();
include 'db.php'; // Include your database connection file

// Default admin credentials
$default_username = 'admin'; // Set your default admin username
$default_password = 'admin123'; // Set your default admin password

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Verify the entered credentials against the default credentials
    if ($username === $default_username && $password === $default_password) {
        // Credentials are correct, set session variable
        $_SESSION['admin_username'] = $username;
        echo "Redirecting to admin dashboard..."; // Debugging line
        header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
ob_end_flush(); // Flush the output buffer
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>

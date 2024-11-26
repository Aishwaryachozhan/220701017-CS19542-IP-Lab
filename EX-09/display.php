<?php
// Database connection
include 'db_connection.php';

$sql = "SELECT EMPID, ENAME, DESIG, DEPT, DOJ, SALARY FROM EMPDETAILS";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Employees</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Employee Details</h2>

    <table border="1">
        <tr>
            <th>EMPID</th>
            <th>ENAME</th>
            <th>DESIGNATION</th>
            <th>DEPARTMENT</th>
            <th>DATE OF JOINING</th>
            <th>SALARY</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["EMPID"] . "</td><td>" . $row["ENAME"] . "</td><td>" . $row["DESIG"] . "</td><td>" . $row["DEPT"] . "</td><td>" . $row["DOJ"] . "</td><td>" . $row["SALARY"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No employees found</td></tr>";
        }
        ?>
    </table>
    
    <a href="index.php"><button class="btn">Go Back</button></a>
</div>

</body>
</html>



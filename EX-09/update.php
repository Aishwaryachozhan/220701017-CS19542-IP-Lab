<?php
// Database connection
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = $_POST['empid'];
    $ename = $_POST['ename'];
    $desig = $_POST['desig'];
    $dept = $_POST['dept'];
    $doj = $_POST['doj'];
    $salary = $_POST['salary'];

    $sql = "UPDATE EMPDETAILS SET ENAME='$ename', DESIG='$desig', DEPT='$dept', DOJ='$doj', SALARY='$salary' WHERE EMPID='$empid'";
    if ($conn->query($sql) === TRUE) {
        echo "Employee details updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
            width: 100%;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Employee Details</h2>
    
    <form method="POST" action="">
        <label for="empid">Employee ID:</label>
        <input type="text" id="empid" name="empid" required>

        <label for="ename">Employee Name:</label>
        <input type="text" id="ename" name="ename" required>

        <label for="desig">Designation:</label>
        <input type="text" id="desig" name="desig" required>

        <label for="dept">Department:</label>
        <input type="text" id="dept" name="dept" required>

        <label for="doj">Date of Joining:</label>
        <input type="date" id="doj" name="doj" required>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" required>

        <input type="submit" value="Update Employee" class="btn">
    </form>
    
    <a href="index.php"><button class="btn">Go Back</button></a>
</div>

</body>
</html>

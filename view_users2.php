<?php

include "connection.php";
session_start();

// SQL query to fetch data from the database entity
$sql = "SELECT * FROM users WHERE user_type = 'user'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Data from Database</h2>

<table>
    <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Password</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["username"]."</td>";
            echo "<td>".$row['firstname'] . " " . $row['lastname']."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["gender"]."</td>";
            echo "<td>".$row["password"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    ?>

</table>

<?php
// Close connection
$conn->close();
?>

</body>
</html>

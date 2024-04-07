<?php
include "connection.php";
session_start();
// Check if connection is successful
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch users from the database, excluding admins
$query = "SELECT * FROM users WHERE user_type = 'user'";
$result = $conn->query($sql);


// Close the connection
mysqli_close($mysqli);
?>

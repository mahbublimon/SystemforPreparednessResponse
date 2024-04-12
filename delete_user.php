<?php
include "connection.php";

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // SQL query to delete user and related records using cascading delete
    $delete_sql = "DELETE FROM users WHERE username='$username'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

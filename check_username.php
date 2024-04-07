<?php
include "connection.php";

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo '<i class="fas fa-times-circle text-danger"></i> Username already exists';
    }else{
        echo '<i class="fas fa-check-circle text-success"></i> Username available';
    }
}
?>

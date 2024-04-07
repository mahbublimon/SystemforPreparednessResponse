<?php 

include "connection.php"; 

if (isset($_GET['disaster_ID'])) {

    $disaster_ID = $_GET['disaster_ID'];

    $sql = "DELETE FROM `disaster` WHERE `disaster_ID`='$disaster_ID'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo '<div class="alert alert-success" role="alert">Record successfully deleted!</div>';
        header( "refresh:2; url=disaster_view.php" ); 

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>
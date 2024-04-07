<?php 

include "connection.php";

if (isset($_POST['update'])) {

    $disaster_ID = $_POST['disaster_ID'];

    $type = $_POST['Type'];

    $severity = $_POST['Severity'];

    $location = $_POST['Location'];

    $time = $_POST['Time'];

    $predictedImpact = $_POST['Predicted_impact']; 

    $sql = "UPDATE `disaster` SET `disaster_ID`='$disaster_ID', `Type`='$type', `Severity`='$severity', `Location`='$location', `Time`='$time', `Predicted_impact`='$predictedImpact'";
 

    $result = $conn->query($sql); 

    if ($result == TRUE) {

        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./disaster_view.php" ); 

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `disaster`";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $disaster_ID = $row['disaster_ID'];

            $type = $row['Type'];

            $severity = $row['Severity'];

            $location  = $row['Location'];

            $time = $row['Time'];

            $predictedImpact = $row['Predicted_impact'];

        } 

    ?>

    <html>
    <head>
        <title>Disaster Update Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container">
        <h2>Disaster Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Disaster information:</legend>

            <div class="form-group">
                <label for="Type">Disaster Type:</label>
                <input type="text" class="form-control" name="Type" value="<?php echo $type; ?>">
            </div>

            <input type="hidden" name="disaster_ID" value="<?php echo $disaster_ID; ?>">

            <div class="form-group">
                <label for="Severity">Severity:</label>
                <input type="text" class="form-control" name="Severity" value="<?php echo $severity; ?>">
            </div>

            <div class="form-group">
                <label for="Location">Location:</label>
                <input type="text" class="form-control" name="Location" value="<?php echo $location; ?>">
            </div>

            <div class="form-group">
                <label for="Time">Time:</label><br>
                <input type="datetime-local" name="Time" value="<?php echo $time; ?>">
            </div>

            <div class="form-group">
                <label for="Predicted_impact">Predicted Impact:</label><br>
                <input type="text" name="Predicted_impact" value="<?php echo $predictedImpact; ?>">

            </div>

            <input type="submit" class="btn btn-primary" value="Update" name="update">

          </fieldset>

        </form> 
    </div>

    </body>
    </html> 

    <?php

    } else{ 

        header('Location: disaster_view.php');

    } 

}

?>
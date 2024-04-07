<?php 

include "connection.php";

$sql = "SELECT disaster_ID, Type, Severity, Location, Time, Predicted_impact FROM disaster";

$result = $conn->query($sql);


// {   id:[1,2,3],
    // name:["a","b","c"]
// .....
// }

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Disaster</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Disaster List</h2>

<table class="table">

    <thead>

    <tr>
        <th>Disaster ID</th>

        <th>Type</th>

        <th>Severity</th>

        <th>Location</th>

        <th>Time</th>

        <th>Predicted Impact</th>

        <th>Action</th>
    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>

                    <tr>

                    <td><?php echo $row['disaster_ID']; ?></td>

                    <td><?php echo $row['Type']; ?></td>

                    <td><?php echo $row['Severity']; ?></td>

                    <td><?php echo $row['Location']; ?></td>

                    <td><?php echo $row['Time']; ?></td>

                    <td><?php echo $row['Predicted_impact']; ?></td>

                    <td>
                        <a class="btn btn-info" href="disaster_update.php?id=<?php echo $row['disaster_ID']; ?>">Edit</a>&nbsp;
                        <a class="btn btn-danger" href="disaster_delete.php?id=<?php echo $row['disaster_ID']; ?>">Delete</a>
                    </td>
                
                    </tr>                       

        <?php   }
            }
            $conn->close(); 
        ?>              

    </tbody>

</table>

<a style="color:black;" class="btn btn-warning" href="form.php"><b>Create User</b></a>
    </div> 
        
</body>

</html>
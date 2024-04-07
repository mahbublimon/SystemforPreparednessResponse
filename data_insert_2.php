<?php
$mysqli = new mysqli('localhost', 'root', '', 'disaster preparedness - group 26');
if ($mysqli->connect_errno != 0) {
    echo $mysqli->connect_error;
}

// Define the disaster types and their corresponding severities
$disasterTypes = array(
    'Earthquake' => 'High',
    'Flood' => 'Medium',
    'Storm' => 'High',
    'Wildfire' => 'High',
    'Landslide' => 'Medium',
    'Volcanic activity' => 'High',
    'Extreme temperature' => 'Low',
    'Fog' => 'Low',
    'Mass movement (dry)' => 'Medium',
    'Insect infestation' => 'Low',
    'Animal accident' => 'Low'
);

// Iterate over each disaster type to populate the disaster table
foreach ($disasterTypes as $type => $severity) {
    // Generate the disaster_ID
    $disasterID = strtoupper(substr($type, 0, 3) . '_' . $severity); // Assuming $severity is available

    // Set the $Severity variable
    $Severity = $severity;

    // Set other attributes based on the type (you may adjust this based on your specific criteria)
    switch ($type) {
        case 'Earthquake':
            $location = 'Seismic area';
            $time = 'Varies';
            $predictedImpact = 'High';
            break;
        case 'Flood':
            $location = 'Flood-prone area';
            $time = 'Seasonal';
            $predictedImpact = 'Medium';
            break;
        case 'Storm':
            $location = 'Coastal area';
            $time = 'Seasonal';
            $predictedImpact = 'High';
            break;
        // Add cases for other disaster types and set their attributes accordingly
        // ...
        default:
            $location = 'Unknown';
            $time = 'Unknown';
            $predictedImpact = 'Unknown';
    }

    // Insert the data into the disaster table
    $stmt = $mysqli->prepare("
        INSERT INTO disaster(disaster_ID, Type, Severity, Location, Time, Predicted_impact)
        VALUES(?, ?, ?, ?, ?, ?)
    ");

    $stmt->bind_param("ssssss", $disasterID, $type, $Severity, $location, $time, $predictedImpact);
    $stmt->execute();
    $stmt->close();
}

$mysqli->close();
?>

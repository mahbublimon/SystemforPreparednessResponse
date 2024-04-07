<?php
$mysqli = new mysqli('localhost', 'root', '', 'disaster preparedness - group 26');
if ($mysqli->connect_errno != 0) {
    echo $mysqli->connect_error;
}

$json_data = file_get_contents("all_disasters.json");

$disasters = json_decode($json_data, true);

foreach ($disasters as $disasterType => $years) {
    foreach ($years as $year => $events) {
        foreach ($events as $eventID => $event) {
            $Year = $year; // Adding Year variable
            $Continent = $event['continent'];
            $Country = $event['country'];
            $ISO = $event['iso'];
            $Groups = $event['group']; // Change to 'Groups'
            $Subgroup = $event['subgroup'];
            $Type = $event['type'];
            $Subtype = $event['subtype'];
            $Deaths = $event['deaths'];
            $Entry = $event['entry'];

            $stmt = $mysqli->prepare("
                INSERT INTO all_disasters(Year, Continent, Country, ISO, Groups, Subgroup, Type, Subtype, Deaths, Entry)
                VALUES(?,?,?,?,?,?,?,?,?,?)
            ");

            $stmt->bind_param("isssssssis", $Year, $Continent, $Country, $ISO, $Groups, $Subgroup, $Type, $Subtype, $Deaths, $Entry);
            $stmt->execute();
            $stmt->close();
        }
    }
}


$mysqli->close();
?>

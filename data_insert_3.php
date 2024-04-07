<?php
$mysqli = new mysqli('localhost', 'root', '', 'disaster preparedness - group 26');
if ($mysqli->connect_errno != 0) {
    echo $mysqli->connect_error;
}

$json_data = file_get_contents("australia.json");
$data = json_decode($json_data, true);

// Iterate over each year's population data
foreach ($data as $year => $population) {
    $count = $population['count'];
    $density = $population['density'];
    $country = 'United Kingdom';
    $iso = 'GBR';
    $continent = 'Europe';
    // Construct the ID using ISO code and Continent
    $id = strtoupper("$iso-$continent-$year"); // Assuming ISO code is BGD and Continent is Asia

    // Insert data into the population table
    $stmt = $mysqli->prepare("
        INSERT INTO population(ID, Country, Year, Population, Density, ISO, Continent)
        VALUES(?, ?, ?, ?, ?, ?, ?)
    ");



    $stmt->bind_param("sssddss", $id, $country, $year, $count, $density, $iso, $continent);
    $stmt->execute();
    $stmt->close();
}

$mysqli->close();
?>

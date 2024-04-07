<?php
include "connection.php"; // Include your database connection file

// Query to get total number of disasters per year
$sql_yearly_disasters = "SELECT Year, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Year";

// Query to get the most affected continents
$sql_most_affected_continents = "SELECT Continent, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Continent ORDER BY total_disasters DESC LIMIT 5";

// Query to get the most affected countries
$sql_most_affected_countries = "SELECT Country, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Country ORDER BY total_disasters DESC LIMIT 5";

// Query to get the most common types of disasters
$sql_most_common_types = "SELECT Type, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Type ORDER BY total_disasters DESC LIMIT 5";

// Execute the queries
$result_yearly_disasters = $conn->query($sql_yearly_disasters);
$result_most_affected_continents = $conn->query($sql_most_affected_continents);
$result_most_affected_countries = $conn->query($sql_most_affected_countries);
$result_most_common_types = $conn->query($sql_most_common_types);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disaster Statistics</title>
</head>
<body>
    <h2>Total Number of Disasters Per Year</h2>
    <table>
        <tr>
            <th>Year</th>
            <th>Total Disasters</th>
        </tr>
        <?php while($row = $result_yearly_disasters->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['Year']; ?></td>
                <td><?php echo $row['total_disasters']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>Most Affected Continents</h2>
    <ul>
        <?php while($row = $result_most_affected_continents->fetch_assoc()): ?>
            <li><?php echo $row['Continent'] . " - " . $row['total_disasters'] . " disasters"; ?></li>
        <?php endwhile; ?>
    </ul>

    <h2>Most Affected Countries</h2>
    <ul>
        <?php while($row = $result_most_affected_countries->fetch_assoc()): ?>
            <li><?php echo $row['Country'] . " - " . $row['total_disasters'] . " disasters"; ?></li>
        <?php endwhile; ?>
    </ul>

    <h2>Most Common Types of Disasters</h2>
    <ul>
        <?php while($row = $result_most_common_types->fetch_assoc()): ?>
            <li><?php echo $row['Type'] . " - " . $row['total_disasters'] . " occurrences"; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

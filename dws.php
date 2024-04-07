<?php
// Include the database connection file
include "connection.php";
session_start();

// Function to retrieve weather data from the database
function getWeatherData() {
    global $conn;
    $query = "SELECT * FROM weather ORDER BY timestamp DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Function to retrieve historical disaster data from the database
function getRegionData() {
    global $conn;
    $query = "SELECT * FROM region";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Function to analyze weather and region data and generate warnings
function generateWarnings() {
    $weatherData = getWeatherData();
    $regionData = getRegionData();

    // Implement your logic to analyze data and generate warnings here
    // Example: Check weather conditions and region data to predict potential disasters

    // For simplicity, let's assume warnings are generated based on specific conditions
    $warning = "No immediate threat detected"; // Default warning
    if ($weatherData['Temperature'] > 30 && count($regionData) > 10) {
        $warning = "High temperature and vulnerable regions observed. Take precautionary measures.";
    }

    return $warning;
}

// Generate warnings
$warning = generateWarnings();

// You can now use $warning to display warnings in your user interface

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disaster Warning System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_user.css"> <!-- Your custom CSS file -->
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Disaster Preparedness</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        User Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="user_dash.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Social
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="https://www.facebook.com/bwotweather.org" class="sidebar-link">Facebook</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="community.php" class="sidebar-link">Community Forum</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="create_post.php" class="sidebar-link">
                                <i class="fa-solid fa-pen pe-2"></i>
                                Create a Post
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Add a new sidebar item for DWS -->
                    <li class="sidebar-item">
                        <a href="dws.php" class="sidebar-link">
                            <i class="fa-solid fa-exclamation-triangle pe-2"></i>
                            Disaster Warning System
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <!-- Your DWS interface content goes here -->
            <div class="content px-3 py-2">
                <div class="container-fluid">
                    <h1>Disaster Warning System</h1>
                    <div class="warning">
                        <h3>Warning:</h3>
                        <p><?php echo $warning; ?></p>
                    </div>
                    <!-- You can add more content related to DWS here -->
                </div>
            </div>
            <footer class="footer">
                <!-- Footer content goes here -->
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Your custom script file -->
    <script src="script.js"></script>
</body>

</html>

<?php
include "connection.php";
session_start();

$sql_yearly_disasters = "SELECT Year, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Year";

$sql_most_affected_continents = "SELECT Continent, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Continent ORDER BY total_disasters DESC LIMIT 5";

$sql_most_affected_countries = "SELECT Country, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Country ORDER BY total_disasters DESC LIMIT 5";

$sql_most_common_types = "SELECT Type, COUNT(*) AS total_disasters FROM all_disasters GROUP BY Type ORDER BY total_disasters DESC LIMIT 5";

$result_yearly_disasters = $conn->query($sql_yearly_disasters);
$result_most_affected_continents = $conn->query($sql_most_affected_continents);
$result_most_affected_countries = $conn->query($sql_most_affected_countries);
$result_most_common_types = $conn->query($sql_most_common_types);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Preparedness Webapp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_user.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Integrated Disaster Preparedness System</a>
                </div>
                <ul class="sidebar-nav">                   
                    <li class="sidebar-header">
                        User Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="admin_dash.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="disaster_analysis_admin.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Disaster Analysis
                        </a>
                    <li class="sidebar-item">
                        <a href="resource_list_admin.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Resources
                        </a>
                    </li>                        
                    </li>
                    <li class="sidebar-item">
                        <a href="map.php" class="sidebar-link">
                            <i class="fa-solid fa-map pe-2"></i>
                            Predicted Disasters Map
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="view_users.php" class="sidebar-link">
                            <i class="fa-solid fa-user pe-2"></i>
                            Users
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
                                <a href="community_admin.php" class="sidebar-link">Community Forum</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="create_post_admin.php" class="sidebar-link">
                                <i class="fa-solid fa-pen pe-2"></i>
                                Create a Post
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Historical Statistics
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="density-disaster_admin.php" class="sidebar-link">Density-Disaster</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="death-disaster_admin.php" class="sidebar-link">Death-Disaster</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="admin_profile.php" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Total Number of Disasters Per Year</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Total Disasters</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $result_yearly_disasters->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['Year']; ?></td>
                                        <td><?php echo $row['total_disasters']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>       
                    
                    <div class="col-md-6">
                        <h2>Most Affected Continents</h2>
                        <ul>
                            <?php while($row = $result_most_affected_continents->fetch_assoc()): ?>
                                <li>
                                    <?php
                                    $continent = strtolower($row['Continent']);
                                    switch ($continent) {
                                        case "asia":
                                            $imageLink = "continents\Asia.png";
                                            break;
                                        case "americas":
                                            $imageLink = "continents\North America.png";
                                            break;
                                        case "africa":
                                            $imageLink = "continents\Africa.png";
                                            break;
                                        case "europe":
                                            $imageLink = "continents\Europe.png";
                                            break;
                                        case "oceania":
                                            $imageLink = "continents\Oceania.png";
                                            break;
                                        default:
                                            $imageLink = ""; 
                                    }
                                    ?>
                                    <img src="<?php echo $imageLink; ?>" alt="<?php echo $row['Continent']; ?>" style="width: 50px; height: 50px;">
                                    <?php echo $row['Continent'] . " - " . $row['total_disasters'] . " disasters"; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>

                        <h2>Most Affected Countries</h2>
                        <ul>
                            <?php while($row = $result_most_affected_countries->fetch_assoc()): ?>
                                <li>
                                    <?php
                                    $country = strtolower($row['Country']);
                                    switch ($country) {
                                        case "india":
                                            $imageLink = "countries/INDIA.png";
                                            break;
                                        case "united states of america (the)":
                                            $imageLink = "countries/USA.png";
                                            break;
                                        case "philippines (the)":
                                            $imageLink = "countries/PHILIPPINES.png";
                                            break;
                                        case "indonesia":
                                            $imageLink = "countries/INDONESIA.png";
                                            break;
                                        case "china":
                                            $imageLink = "countries/CHINA.png";
                                            break;
                                        default:
                                            $imageLink = ""; 
                                    }
                                    ?>
                                    <img src="<?php echo $imageLink; ?>" alt="<?php echo $row['Country']; ?>" style="width: 50px; height: 50px;">
                                    <?php echo $row['Country'] . " - " . $row['total_disasters'] . " disasters"; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>

                        <h2>Most Common Types of Disasters</h2>
                        <ul>
                            <?php while($row = $result_most_common_types->fetch_assoc()): ?>
                                <li>
                                    <?php
                                    $disaster = strtolower($row['Type']);
                                    switch ($disaster) {
                                        case "flood":
                                            $imageLink = "disaster_pic/Flood.png";
                                            break;
                                        case "storm":
                                            $imageLink = "disaster_pic/Storm.png";
                                            break;
                                        case "epidemic":
                                            $imageLink = "disaster_pic/Epidemic.png";
                                            break;
                                        case "earthquake":
                                            $imageLink = "disaster_pic/Earthquake.png";
                                            break;
                                        case "landslide":
                                            $imageLink = "disaster_pic/Landslide.png";
                                            break;
                                        default:
                                            $imageLink = ""; 
                                    }
                                    ?>
                                    <img src="<?php echo $imageLink; ?>" alt="<?php echo $row['Type']; ?>" style="width: 50px; height: 50px;">
                                    <?php echo $row['Type'] . " - " . $row['total_disasters'] . " occurrences"; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>                
                </div>
            </div>          
        </div>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>

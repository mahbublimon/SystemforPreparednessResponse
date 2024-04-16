<?php
include "connection.php";
$sql = "SELECT  
            all_disasters.Country,
            SUM(all_disasters.Deaths) AS TotalDeaths,
            COUNT(all_disasters.all_disasters_id) AS TotalDisasters,
            population.Density
        FROM 
            all_disasters
        INNER JOIN 
            population ON all_disasters.Country = population.Country AND all_disasters.Year = population.Year
        GROUP BY 
            all_disasters.Country;";

$result = $conn->query($sql);

$countries = [];
$ratios = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $countries[] = $row["Country"];
        if ($row["TotalDisasters"] != 0) {
            $deathDisasterRatio = $row["TotalDeaths"] / $row["TotalDisasters"];
            $ratios[] = round($deathDisasterRatio, 2);
        } else {
            $ratios[] = "N/A";
        }
    }
} else {
    $countries[] = "No data available";
    $ratios[] = 0;
}

$countries_js = json_encode($countries);
$ratios_js = json_encode($ratios);
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
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
                        <a href="user_dash.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="disaster_analysis.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Disaster Analysis
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="resource_list.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Resources
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="map.php" class="sidebar-link">
                            <i class="fa-solid fa-map pe-2"></i>
                            Predicted Disasters Map
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
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Historical Statistics
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="density-disaster.php" class="sidebar-link">Density-Disaster</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="death-disaster.php" class="sidebar-link">Death-Disaster</a>
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
                                <a href="user_profile.php" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container">
                    <h1 class="mt-5">Death-to-Disaster Ratio Histogram</h1>
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="link not created" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="link not created" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="link not created" class="text-muted">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        var countries = <?php echo $countries_js; ?>;
        var ratios = <?php echo $ratios_js; ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: countries,
                datasets: [{
                    label: 'Death-to-Disaster Ratio',
                    data: ratios,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Countries'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Death-to-Disaster Ratio'
                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>    
</body>

</html>
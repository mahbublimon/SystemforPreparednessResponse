<?php
include "connection.php";
session_start();
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
                <div class="container-fluid">
                    <div class="mb-3">
                    <div class="row">
                        <div class="col-10 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-112">
                                            <div class="p-3 m-1">
                                                <h4>Today's Weather</h4>
                                                <div class="weather-widget" id="weather-widget">
                                                    <a class="weatherwidget-io" href="https://forecast7.com/en/23d8190d34/dhaka-district/" data-label_1="DHAKA DISTRICT" data-label_2="WEATHER" data-theme="original" >DHAKA DISTRICT WEATHER</a>     
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <img src="123.png" height="250px" class="mr-3">
                                        <div class="flex-grow-1">
                                            <ul><b>
                                                <li>Emergency Service: 999</li>
                                                <br>
                                                <li>Emergency Response Message: 10941</li>
                                                <br>
                                                <li>Information Service: 333</li>
                                                <br>
                                                <li>Fire Service: 16163</li>
                                                </b>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                <!-- Table Element -->
                <div class="natural-disasters-widget">
                    <h3>Latest Natural Disaster News</h3>
                    <ul id="news-list"></ul>
                </div>
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
</body>

</html>
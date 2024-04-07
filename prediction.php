<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Preparedness Webapp</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style_user.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="js-sidebar">
            <!-- Sidebar Content -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Integrated Disaster Preparedness System</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">User Elements</li>
                    <li class="sidebar-item">
                        <a href="user_dash.php" class="sidebar-link">
                            <i class="fas fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false">
                            <i class="fas fa-sliders pe-2"></i>
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
                                    <i class="fas fa-pen pe-2"></i>
                                    Create a Post
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="main">
            <!-- Navbar -->
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
            <!-- Main Content Area -->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <!-- Predicted Natural Calamities Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Natural Calamity Prediction</h3>
                            <form id="predictionForm">
                                <div class="form-group">
                                    <label for="regionID">Region ID:</label>
                                    <input type="text" class="form-control" id="regionID" name="regionID" placeholder="Enter Region ID">
                                </div>
                                <button type="submit" class="btn btn-primary">Predict</button>
                            </form>
                            <div id="predictionResult" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Theme Toggle -->
            <a href="#" class="theme-toggle">
                <i class="far fa-moon"></i>
                <i class="far fa-sun"></i>
            </a>
            <!-- Footer -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

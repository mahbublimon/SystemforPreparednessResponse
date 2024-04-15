<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];

    // SQL query to update user data
    $sql = "UPDATE users SET 
            firstname='$firstname', 
            lastname='$lastname', 
            email='$email', 
            gender='$gender', 
            password='$password' 
            WHERE username='$username'";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        // Redirect the user to view updated user profile
        header("Location: view_users.php"); // Assuming user_profile.php displays user profile based on username
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Fetch user data based on username from URL parameter
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // Populate form fields with fetched data
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $gender = $row['gender'];
        $password = $row['password'];
    } else {
        echo "No user found with username: $username";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Preparedness Webapp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_user.css"></head>
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
                <h2>Update User</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">    
                    <!-- Form Fields with Prefilled Data -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" required>
                            <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if($gender == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" username="password" name="password" value="<?php echo $password; ?>" required>
                    </div>
                    <!-- Husernameden field to pass user username -->
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
    $(document).ready(function(){
        $('#username').keyup(function(){
            var username = $(this).val();
            if(username !== ''){
                $.ajax({
                    url: 'check_username.php',
                    type: 'post',
                    data: {username: username},
                    success: function(response){
                        $('#usernameValidation').html(response);
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
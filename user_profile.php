<?php
include "connection.php";
session_start();


$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$user_type = $row['user_type'];
$username = $row['username'];
$name = $row['firstname'] . " " . $row['lastname'];
$email = $row['email'];
$gender = $row['gender'];
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style_user.css">
</head>

<body>
    <div class="container-fluid">
        <div class="mb-3">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2 class="text-center">Admin Profile</h2>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="user_type" class="form-label">Type:</label>
                                <input type="text" class="form-control" id="user_type" value="<?php echo $user_type; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" value="<?php echo $name; ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $email; ?>" readonly>
                            </div>                            
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <input type="text" class="form-control" id="gender" value="<?php echo $gender; ?>" readonly>
                            </div>
                            <div class="text-center">
                                <a href="user_dash.php" class="btn btn-primary">Back to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once 'db.php';

// Read operation - Display user data
$username = $_SESSION['username'];
$sql = "SELECT * FROM logins WHERE username = '$username'";
$result = $conn->query($sql);
$userData = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <div class="container">
        <p class="user-info">User Info:</p>
        <ul class="user-info">
            <li>ID: <?php echo $userData['id']; ?></li>
            <li>Username: <?php echo $userData['username']; ?></li>
        </ul>

        <p class="operations">Operations:</p>
        <ul class="operations">
            <li><a href="edit_profile.php">Edit Profile</a></li>
            <li><a href="delete_account.php">Delete Account</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>

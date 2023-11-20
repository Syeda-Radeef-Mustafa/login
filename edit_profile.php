<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to update user data
    $newPassword = $_POST['new_password'];
    $username = $_SESSION['username'];

    $sql = "UPDATE logins SET password = '$newPassword' WHERE username = '$username'";
    $conn->query($sql);

    // Redirect back to the dashboard after updating
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="edit_profile.css">
</head>
<body>
    <h2>Edit Profile</h2>
    <form action="edit_profile.php" method="post">
        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required><br>

        <input type="submit" value="Update Profile">
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

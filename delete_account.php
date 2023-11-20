<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include_once 'db.php';

$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission to delete the account
    $sql = "DELETE FROM logins WHERE username = '$username'";
    $conn->query($sql);

    // Logout after account deletion
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link rel="stylesheet" href="delete_account.css">
</head>
<body>
    <h2>Delete Account</h2>
    <p>Are you sure you want to delete your account?</p>
    <form action="delete_account.php" method="post">
        <input type="submit" value="Yes, Delete My Account">
    </form>
    <a href="dashboard.php">Cancel</a>
</body>
</html>

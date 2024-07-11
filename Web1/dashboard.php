<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to your dashboard, <?php echo htmlspecialchars($_SESSION["email"]); ?>!</h2>
    <p>This is a protected page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>

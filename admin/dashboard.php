<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="sidebar">
        <?php include 'includes/sidebar.php'; ?>
    </div>
    <div class="content">
        <h1>Welcome to the Dashboard</h1>
        <p>This is the main dashboard page.</p>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>

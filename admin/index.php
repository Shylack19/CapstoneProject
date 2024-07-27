<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

header('Location: dashboard.php');
exit();
?>

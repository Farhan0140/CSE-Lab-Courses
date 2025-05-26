<?php
session_start();
if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
echo "Welcome, User " . $_SESSION['username'];
?>

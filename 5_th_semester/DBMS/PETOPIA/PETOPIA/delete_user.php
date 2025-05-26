<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

include('database.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid User ID.");
}

$user_id = intval($_GET['id']);


if ($_SESSION['user_id'] == $user_id) {
    die("You cannot delete your own account.");
}

$stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    header("Location: user_management.php");
    exit();
} else {
    echo "Error deleting user.";
}

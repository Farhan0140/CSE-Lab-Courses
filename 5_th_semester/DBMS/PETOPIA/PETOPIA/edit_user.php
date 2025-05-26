<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

include('database.php');

// Get user ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("User ID is missing.");
}

$user_id = intval($_GET['id']);

// Fetch user details
$stmt = $conn->prepare("SELECT username, email, role FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("User not found.");
}

$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $update_stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE user_id = ?");
    $update_stmt->bind_param("sssi", $username, $email, $role, $user_id);

    if ($update_stmt->execute()) {
        header("Location: user_management.php");
        exit();
    } else {
        echo "Error updating user: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f39e60;
        color: #333;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        min-height: 100vh;
    }

    h2 {
        margin-bottom: 20px;
        color: #fff;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }

    form {
        background-color: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 6px;
        color: #555;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    button {
        background-color: #f39e60;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #e08749;
    }

    a {
        margin-top: 20px;
        display: inline-block;
        text-decoration: none;
        color: #fff;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 480px) {
        form {
            padding: 20px;
        }

        h2 {
            font-size: 1.5rem;
        }
    }
</style>

    <title>Edit User - Petopia</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required><br><br>

        <label>Role:</label><br>
        <select name="role" required>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
        </select><br><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="user_management.php">Back to User Management</a>
</body>
</html>

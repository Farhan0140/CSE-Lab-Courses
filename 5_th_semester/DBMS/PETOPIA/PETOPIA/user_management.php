<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

include('database.php'); 


$sql = "SELECT user_id, username, email, role FROM users";
$result = $conn->query($sql);


if ($result === false) {
    die("ERROR: Could not execute query. " . $conn->error);
}

$users = [];
while ($user = $result->fetch_assoc()) {
    $users[] = $user; 
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Petopia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F39E60;
            color: #333;
        }
        .main-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            margin: 30px;
        }
        .table th {
            background-color: #7C444F;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .btn {
            font-weight: 500;
        }
        .btn-warning {
            background-color: #E16A54;
            border-color: #E16A54;
        }
        .btn-danger {
            background-color: #F05D5E;
            border-color: #F05D5E;
        }
        .btn-secondary {
            background-color: #7C444F;
            border-color: #7C444F;
        }
        h1 {
            color: #7C444F;
            font-weight: 700;
            text-align: center;
        }
        .back-arrow {
            font-size: 24px;
            color: white;
            text-decoration: none;
            background-color: #7C444F;
            border-radius: 50%;
            padding: 12px;
            width: 50px;
            height: 50px;
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .back-arrow:hover {
            background-color: #F39E60;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="admin_dashboard.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
        <div class="main-content">
            <h1>User Management</h1>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['user_id']); ?></td>
                            <td><?= htmlspecialchars($user['username']); ?></td>
                            <td><?= htmlspecialchars($user['email']); ?></td>
                            <td><?= htmlspecialchars($user['role']); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?= urlencode($user['user_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_user.php?id=<?= urlencode($user['user_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

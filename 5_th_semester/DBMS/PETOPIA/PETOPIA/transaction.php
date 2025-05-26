<?php
// Start session and check if the admin is logged in
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect to login page if not an admin
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions - Petopia Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F39E60;
        }
        .main-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .table {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #7C444F;
            color: white;
        }
        .btn-primary {
            background-color: #9F5255;
            border-color: #9F5255;
        }
        .btn-secondary {
            background-color: #7C444F;
            border-color: #7C444F;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h2">Transactions</h1>
                
            </div>
            <p>Manage all transactions here.</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Rows -->
                    <tr>
                        <td>1001</td>
                        <td>John Doe</td>
                        <td>$150</td>
                        <td>2025-01-01</td>
                        <td>Completed</td>
                        <td>
                            <button class="btn btn-warning btn-sm">View</button>
                            <button class="btn btn-danger btn-sm">Refund</button>
                        </td>
                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>Jane Smith</td>
                        <td>$250</td>
                        <td>2025-01-02</td>
                        <td>Pending</td>
                        <td>
                            <button class="btn btn-warning btn-sm">View</button>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Back to Dashboard Button -->
            <a href="admin_dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

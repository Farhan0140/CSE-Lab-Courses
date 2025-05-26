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
    <title>Admin Dashboard - Petopia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #ffcc66, #ffa500);
            color: white;
        }

        .sidebar .logo {
            text-align: center;
            margin: 20px 0;
        }

        .sidebar .logo img {
            max-width: 150px;
            cursor: pointer;
        }

        .sidebar h2 {
            color: white;
            font-weight: 700;
        }

        .sidebar .nav-link {
            color: white;
            font-weight: 500;
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #ffe680;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-weight: 700;
            color: #ff9900;
        }

        .main-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ffa500;
            font-weight: 700;
        }

        .stats-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .stats-section .stat-card {
            flex: 1 1 30%;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo">
                        </a>
                    </div>
                    <h2 class="text-center mt-3">Petopia Admin</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_management.php">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listing_management.php">Listings Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transaction_management.php">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="appointments.php">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reports.php">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer_message.php">Customer Messages</a>
                        </li>
                        <li>
                            <a class="nav-link" href="index.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="main-content">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard Overview</h1>
                    </div>
                    <div id="overview" class="mb-5">
                        <div class="stats-section">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users</h5>
                                    <p class="card-text" id="total-users">Loading...</p>
                                </div>
                            </div>
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Active Listings</h5>
                                    <p class="card-text" id="active-listings">Loading...</p>
                                </div>
                            </div>
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Transactions</h5>
                                    <p class="card-text" id="total-transactions">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        async function fetchDashboardData() {
            try {
                const response = await fetch('get_dashboard_data.php');
                if (!response.ok) throw new Error('Failed to fetch data');
                const data = await response.json();
                document.getElementById('total-users').textContent = data.total_users;
                document.getElementById('active-listings').textContent = data.active_listings;
                document.getElementById('total-transactions').textContent = data.total_transactions;
            } catch (error) {
                console.error('Error:', error);
            }
        }
        document.addEventListener('DOMContentLoaded', fetchDashboardData);
    </script>
</body>

</html>

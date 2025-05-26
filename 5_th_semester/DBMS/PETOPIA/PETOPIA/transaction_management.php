<?php
// Start session and check if the admin is logged in
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect to login page if not an admin
    exit();
}

// Database connection
include('database.php');

// Fetch all transactions
$query = "SELECT t.transaction_id, u.username, p.name AS product_name, t.quantity, t.price, t.transaction_date 
          FROM transactions t
          JOIN users u ON t.user_id = u.user_id
          JOIN products p ON t.product_id = p.product_id
          WHERE p.product_type = 'food'";
          $result = mysqli_query($conn, $query);

// Check for any errors
if (!$result) {
    die('Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Management - Petopia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f3f0;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #7C444F, #9F5255);
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

        .main-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #7C444F;
            font-weight: 700;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo">
                        </a>
                    </div>
                    <h2 class="text-center mt-3">Petopia Admin</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_management.php">User Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="listing_management.php">Listings Management</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="transaction_management.php">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="appointments.php">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reports.php">Reports</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="main-content">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Transaction Management</h1>
                    </div>

                    <!-- Transactions Table -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>User</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['transaction_id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo ucfirst($row['product_type']); ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td>$<?php echo number_format($row['price'], 2); ?></td>
                                    <td><?php echo date('Y-m-d H:i', strtotime($row['transaction_date'])); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

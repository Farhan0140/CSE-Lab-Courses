<?php
// Start session and check if the admin is logged in
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect to login page if not an admin
    exit();
}

// Include database connection
require_once('database.php');

// Fetch customer messages from the database
$query = "SELECT * FROM customer_message ORDER BY name";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Messages - Petopia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
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
                            <a class="nav-link" href="overview.php">Overview</a>
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
                            <a class="nav-link active" href="customer_message.php">Customer Messages</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="main-content">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Customer Messages</h1>
                    </div>

                    <!-- Messages Table -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Message</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                        <td><?php echo htmlspecialchars($row['service']); ?></td>
                                        <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                                       
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>

<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}
include('database.php'); // Assuming a database connection is set up

// Fetch all products from the database
$sql = "SELECT * FROM foods";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="manage_products.php">Manage Products</a></li>
                <li><a href="manage_sellers.php">Manage Sellers</a></li>
                <li><a href="manage_transactions.php">Manage Transactions</a></li>
                <li><a href="manage_vet_records.php">Manage Vet Records</a></li>
                <li><a href="generate_reports.php">Generate Reports</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <h1>Manage Pet Products</h1>
            <button><a href="add_product.php">Add New Product</a></button>

            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['brand']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td>
                            <a href="edit_product.php?id=<?php echo $row['food_id']; ?>">Edit</a> | 
                            <a href="delete_product.php?id=<?php echo $row['food_id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>

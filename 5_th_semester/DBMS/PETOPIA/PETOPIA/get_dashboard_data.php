<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    http_response_code(401); // Unauthorized
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

include('database.php'); // Include your database connection

$data = [
    "total_users" => 0,
    "active_listings" => 0,
    "total_transactions" => 0,
    "total_appointments" => 0
];

// Total Users
$result = $conn->query("SELECT COUNT(*) AS count FROM users");
if ($result && $row = $result->fetch_assoc()) {
    $data['total_users'] = $row['count'];
}

// Active Listings
if ($conn->query("SHOW TABLES LIKE 'listings'")->num_rows > 0) {
    $result = $conn->query("SELECT COUNT(*) AS count FROM listings WHERE status = 'active'");
    if ($result && $row = $result->fetch_assoc()) {
        $data['active_listings'] = $row['count'];
    }
}

// Total Transactions
if ($conn->query("SHOW TABLES LIKE 'transactions'")->num_rows > 0) {
    $result = $conn->query("SELECT COUNT(*) AS count FROM transactions");
    if ($result && $row = $result->fetch_assoc()) {
        $data['total_transactions'] = $row['count'];
    }
}

// Total Appointments
if ($conn->query("SHOW TABLES LIKE 'appointments'")->num_rows > 0) {
    $result = $conn->query("SELECT COUNT(*) AS count FROM appointments");
    if ($result && $row = $result->fetch_assoc()) {
        $data['total_appointments'] = $row['count'];
    }
}


header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>

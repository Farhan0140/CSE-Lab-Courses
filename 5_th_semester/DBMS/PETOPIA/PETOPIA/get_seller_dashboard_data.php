<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    http_response_code(401); // Unauthorized
    echo json_encode(["error" => "Unauthorized"]);
    exit();
}

include('database.php'); // Include database connection

$seller_id = $_SESSION['user_id']; // Assuming seller_id is stored in session
$data = [
    "total_pets" => 0,
    "active_listings" => 0,
    "total_transactions" => 0,
    "total_revenue" => 0
];

// Total Pets
$result = $conn->query("SELECT COUNT(*) AS count FROM pets WHERE seller_id = '$seller_id'");
if ($result && $row = $result->fetch_assoc()) {
    $data['total_pets'] = $row['count'];
}

// Active Listings
$result = $conn->query("SELECT COUNT(*) AS count FROM cat_listing WHERE status = 'active' AND listing_id IN (SELECT pet_id FROM pets WHERE seller_id = '$seller_id')");
if ($result && $row = $result->fetch_assoc()) {
    $data['active_listings'] = $row['count'];
}

// Total Transactions
$result = $conn->query("SELECT COUNT(*) AS count FROM transactions WHERE seller_id = '$seller_id'");
if ($result && $row = $result->fetch_assoc()) {
    $data['total_transactions'] = $row['count'];
}

// Total Revenue
$result = $conn->query("SELECT SUM(amount) AS revenue FROM transactions WHERE seller_id = '$seller_id' AND payment_status = 'completed'");
if ($result && $row = $result->fetch_assoc()) {
    $data['total_revenue'] = $row['revenue'] ?? 0;
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>

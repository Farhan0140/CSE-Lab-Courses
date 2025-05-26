<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Get the data sent via the POST request
$data = json_decode(file_get_contents('php://input'), true);
$food_id = $data['food_id'];
$user_id = $data['user_id'];

// Check if the user is logged in
if (isset($user_id) && isset($food_id)) {
    // Prepare SQL query to insert transaction into the database
    $stmt = $conn->prepare("INSERT INTO transactions (user_id, food_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $food_id);

    // Execute the query and check if the transaction was successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Purchase successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to process purchase.']);
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid data or not logged in.']);
}

// Close the database connection
$conn->close();
?>

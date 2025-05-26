<?php
include 'database.php';

// Add a new pet accessory
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $image_url = $_POST['image_url'];
    $price = floatval($_POST['price']);
    $discount_price = isset($_POST['discount_price']) ? floatval($_POST['discount_price']) : null;

    $sql = "INSERT INTO cat_accessories (type, name, brand, image_url, price, discount_price) 
             VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdd", $type, $name, $brand, $image_url, $price, $discount_price);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pet accessory added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to add pet accessory"]);
    }
}


// Fetch accessories with filtering
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'list') {
    $minPrice = isset($_GET['min_price']) ? floatval($_GET['min_price']) : null;
    $maxPrice = isset($_GET['max_price']) ? floatval($_GET['max_price']) : null;

    $sql = "SELECT accessories_id, type, name, brand, image_url, price, discount_price FROM cat_accessories";
    $params = [];
    $types = "";
    
    if ($minPrice !== null || $maxPrice !== null) {
        $sql .= " WHERE";
        if ($minPrice !== null) {
            $sql .= " price >= ?";
            $params[] = $minPrice;
            $types .= "d";
        }
        if ($maxPrice !== null) {
            if (!empty($params)) $sql .= " AND";
            $sql .= " price <= ?";
            $params[] = $maxPrice;
            $types .= "d";
        }
    }

    $stmt = $conn->prepare($sql);
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    $accessories = [];
    while ($row = $result->fetch_assoc()) {
        $accessories[] = $row;
    }
    echo json_encode($accessories);
}

// Fetch details of a single pet accessory
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accessory_id'])) {
    $accessory_id = intval($_GET['accessory_id']);
    $sql = "SELECT accessories_id, type, name, brand, image_url, price, discount_price FROM cat_accessories WHERE accessories_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $accessory_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["status" => "error", "message" => "Cat accessory not found"]);
    }
}

?>
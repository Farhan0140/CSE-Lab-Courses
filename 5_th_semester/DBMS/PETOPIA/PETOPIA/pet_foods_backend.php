<?php
include 'database.php';

// Add a new pet food
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $nutrition_details = $_POST['nutrition_details'];
    $recommended_for = $_POST['recommended_for'];
    $image_url = $_POST['image_url'];
    $price = floatval($_POST['price']);
    $discount_price = isset($_POST['discount_price']) ? floatval($_POST['discount_price']) : null;

    $sql = "INSERT INTO pet_foods (brand, name, type, nutrition_details, recommended_for, image_url, price, discount_price) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssdd", $brand, $name, $type, $nutrition_details, $recommended_for, $image_url, $price, $discount_price);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Pet food added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to add pet food"]);
    }
}


// Fetch all or filtered pet foods
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'list') {
    $sql = "SELECT food_id, brand, name, type, nutrition_details, recommended_for, image_url, 
    LEAST(price, discount_price) AS discount_price, 
    GREATEST(price, discount_price) AS price 
    FROM pet_foods";
    
    // Check for price range filter
    if (isset($_GET['price_min']) && isset($_GET['price_max'])) {
        $price_min = floatval($_GET['price_min']);
        $price_max = floatval($_GET['price_max']);
        $sql .= " WHERE price BETWEEN ? AND ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("dd", $price_min, $price_max);
    } else {
        $stmt = $conn->prepare($sql);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();

    $foods = [];
    while ($row = $result->fetch_assoc()) {
        $foods[] = $row;
    }
    echo json_encode($foods);
}



// Fetch details of a single pet food
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['food_id'])) {
    $food_id = intval($_GET['food_id']);
    $sql = "SELECT food_id, brand, name, type, nutrition_details, recommended_for, image_url, discount_price, price, FROM pet_foods WHERE food_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $food_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["status" => "error", "message" => "Pet food not found"]);
    }
}


?>

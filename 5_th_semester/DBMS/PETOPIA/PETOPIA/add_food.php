<?php
session_start();
include('database.php'); // Database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $nutrition_details = $_POST['nutrition_details'];
    $recommended_for = $_POST['recommended_for'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];
    $discount_price = $_POST['discount_price'];

    // Insert data into pet_foods table
    $sql = "INSERT INTO pet_foods (brand, name, type, nutrition_details, recommended_for, image_url, price, discount_price) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssdd", $brand, $name, $type, $nutrition_details, $recommended_for, $image_url, $price, $discount_price);

    if ($stmt->execute()) {
        $success_message = "Food item added successfully!";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe680;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #ffa900;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input, textarea {
            margin-top: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #ffa900;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff8c00;
        }

        .message {
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Food Item</h1>
        <?php if (isset($success_message)) { ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php } elseif (isset($error_message)) { ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="add_food.php">
            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="nutrition_details">Nutrition Details:</label>
            <textarea id="nutrition_details" name="nutrition_details" rows="4" required></textarea>

            <label for="recommended_for">Recommended For:</label>
            <input type="text" id="recommended_for" name="recommended_for" required>

            <label for="image_url">Image URL:</label>
            <input type="url" id="image_url" name="image_url" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="discount_price">Discount Price:</label>
            <input type="number" id="discount_price" name="discount_price" step="0.01" required>

            <button type="submit">Add Food</button>
        </form>
    </div>
</body>

</html>

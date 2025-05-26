<?php
session_start();
include('database.php'); // Database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $image_url = $_POST['image_url'];
    $price = $_POST['price'];
    $discount_price = $_POST['discount_price'];

    // Set timestamps
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    // Insert data into accessories table
    $sql = "INSERT INTO cat_accessories (type, name, brand, image_url, price, discount_price, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssddss", $type, $name, $brand, $image_url, $price, $discount_price, $created_at, $updated_at);

    if ($stmt->execute()) {
        $success_message = "Accessory added successfully!";
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
    <title>Add Accessories</title>
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

        input {
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
        <h1>Add Accessory</h1>
        <?php if (isset($success_message)) { ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php } elseif (isset($error_message)) { ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="add_accessories.php">
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="brand">Brand:</label>
            <input type="text" id="brand" name="brand" required>

            <label for="image_url">Image URL:</label>
            <input type="url" id="image_url" name="image_url" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="discount_price">Discount Price:</label>
            <input type="number" id="discount_price" name="discount_price" step="0.01" required>

            <button type="submit">Add Accessory</button>
        </form>
    </div>
</body>

</html>

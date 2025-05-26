<?php
session_start();
include('database.php'); // Ensure database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $discount_price = $_POST['discount_price'];

    // Insert data into the database
    $sql = "INSERT INTO cat_toys (name, type, brand, image_url, description, price, discount_price, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssd", $name, $type, $brand, $image_url, $description, $price, $discount_price);

    if ($stmt->execute()) {
        $success_message = "Toy added successfully!";
    } else {
        $error_message = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Toy</title>
    <style>
        body {
            margin: 0;
            font-family: 'Verdana', sans-serif;
            background-color: #ffe680;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #ff6600;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input, textarea, select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background-color: #ffa500;
            color: #fff;
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        button:hover {
            background-color: #ff6600;
            transform: translateY(-2px);
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1em;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #4caf50;
        }

        .error {
            background-color: #f44336;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Add a New Toy</h1>

        <?php if (!empty($success_message)) : ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <?php if (!empty($error_message)) : ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="name">Toy Name</label>
            <input type="text" id="name" name="name" required>

            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>

            <label for="brand">Brand</label>
            <input type="text" id="brand" name="brand" required>

            <label for="image_url">Image URL</label>
            <input type="url" id="image_url" name="image_url" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="discount_price">Discount Price</label>
            <input type="number" id="discount_price" name="discount_price" step="0.01">

            <button type="submit">Add Toy</button>
        </form>
    </div>
</body>

</html>

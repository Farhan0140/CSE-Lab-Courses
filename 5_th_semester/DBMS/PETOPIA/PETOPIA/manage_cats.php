<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    header('Location: login.php'); // Redirect to login page if not a seller
    exit();
}

// Database connection
include('database.php'); // Include your database connection file

// Initialize variables
$message = "";

// Handle form submission for adding new cats
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_cat'])) {
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $certification = $_POST['certification'];
    $vaccination_status = $_POST['vaccination_status'];
    $user_id = $_SESSION['user_id'];

    // Insert into pets table
    $stmt = $conn->prepare("INSERT INTO pets (breed, age, gender, color, type, user_id) VALUES (?, ?, ?, ?, 'cat', ?)");
    $stmt->bind_param("sisss", $breed, $age, $gender, $color, $user_id);
    if ($stmt->execute()) {
        $pet_id = $stmt->insert_id;
        $stmt->close();

        // Insert into cat listing table
        $stmt = $conn->prepare("INSERT INTO cat_listing (price, status, certification, vaccination_status, pet_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("dsssi", $price, $status, $certification, $vaccination_status, $pet_id);
        if ($stmt->execute()) {
            $message = "New cat added successfully!";
        } else {
            $message = "Error adding cat listing: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "Error adding pet: " . $stmt->error;
    }
}

// Fetch all cats listed by the seller
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT pets.pet_id, pets.breed, pets.age, pets.gender, pets.color, cat_listing.listing_id, cat_listing.price, cat_listing.status, cat_listing.certification, cat_listing.vaccination_status FROM pets INNER JOIN cat_listing ON pets.pet_id = cat_listing.pet_id WHERE pets.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cats = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 30px;
        }

        form input, form select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Manage Cats</h1>

        <?php if ($message) : ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Form to Add New Cat -->
        <form method="POST">
            <h2>Add New Cat</h2>
            <input type="text" name="breed" placeholder="Breed" required>
            <input type="number" name="age" placeholder="Age" required>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="text" name="color" placeholder="Color" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <select name="status" required>
                <option value="">Select Status</option>
                <option value="Available">Available</option>
                <option value="Sold">Sold</option>
            </select>
            <input type="text" name="certification" placeholder="Certification">
            <select name="vaccination_status" required>
                <option value="">Select Vaccination Status</option>
                <option value="Up-to-date">Up-to-date</option>
                <option value="Not vaccinated">Not vaccinated</option>
            </select>
            <button type="submit" name="add_cat">Add Cat</button>
        </form>

        <!-- Table to Display Existing Cats -->
        <h2>Existing Cats</h2>
        <table>
            <thead>
                <tr>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Certification</th>
                    <th>Vaccination Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cats as $cat) : ?>
                    <tr>
                        <td><?php echo $cat['breed']; ?></td>
                        <td><?php echo $cat['age']; ?></td>
                        <td><?php echo $cat['gender']; ?></td>
                        <td><?php echo $cat['color']; ?></td>
                        <td><?php echo $cat['price']; ?></td>
                        <td><?php echo $cat['status']; ?></td>
                        <td><?php echo $cat['certification']; ?></td>
                        <td><?php echo $cat['vaccination_status']; ?></td>
                        <td><button class="edit-button">Edit</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

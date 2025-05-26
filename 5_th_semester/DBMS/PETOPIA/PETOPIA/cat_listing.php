
<?php
// Start session and check if the admin is logged in
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect to login page if not an admin
    exit();
}

include('database.php'); // Include the database connection file

// Initialize variables
$price = $vaccination_status = $certification = $status = "";
$price_err = $vaccination_status_err = $certification_err = $status_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    if (empty($_POST["price"])) {
        $price_err = "Price is required.";
    } else {
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
    }

    if (empty($_POST["vaccination_status"])) {
        $vaccination_status_err = "Vaccination status is required.";
    } else {
        $vaccination_status = mysqli_real_escape_string($conn, $_POST["vaccination_status"]);
    }

    if (empty($_POST["certification"])) {
        $certification_err = "Certification is required.";
    } else {
        $certification = mysqli_real_escape_string($conn, $_POST["certification"]);
    }

    if (empty($_POST["status"])) {
        $status_err = "Status is required.";
    } else {
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
    }

    // If there are no errors, insert data into the database
    if (empty($price_err) && empty($vaccination_status_err) && empty($certification_err) && empty($status_err)) {
        // SQL query to insert new listing
        $sql = "INSERT INTO Cat_Listing (price, vaccination_status, certification, status) 
                VALUES ('$price', '$vaccination_status', '$certification', '$status')";

        if ($conn->query($sql) === TRUE) {
            header("Location: listing_management.php"); // Redirect to listing management page
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Listing - Petopia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F39E60;
            color: #333;
        }
        .main-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            margin: 30px;
        }
        h1 {
            color: #7C444F;
            font-weight: 700;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #7C444F;
            border-color: #7C444F;
        }
        .btn-primary:hover {
            background-color: #E16A54;
            border-color: #E16A54;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-content">
            <h1>Add New Listing</h1>
            <form action="cat_listing.php" method="post">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($price); ?>">
                    <span class="text-danger"><?= $price_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="vaccination_status">Vaccination Status</label>
                    <input type="text" class="form-control" id="vaccination_status" name="vaccination_status" value="<?= htmlspecialchars($vaccination_status); ?>">
                    <span class="text-danger"><?= $vaccination_status_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="certification">Certification</label>
                    <input type="text" class="form-control" id="certification" name="certification" value="<?= htmlspecialchars($certification); ?>">
                    <span class="text-danger"><?= $certification_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?= htmlspecialchars($status); ?>">
                    <span class="text-danger"><?= $status_err; ?></span>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Listing</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>

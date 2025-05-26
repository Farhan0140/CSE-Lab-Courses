<?php
session_start();

include('database.php'); // This assumes 'database.php' is in the same directory

// Query to count total pets
$sql = "SELECT COUNT(*) AS total_pets FROM pets"; // Assuming your pets table is named 'pets'
$result = $conn->query($sql);

// Fetch the result
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_pets = $row['total_pets'];
} else {
    $total_pets = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller's Dashboard</title>
    <style>
   /* General Styles */
   body {
            margin: 0;
            font-family: 'Verdana', sans-serif;
            background-color: #ffe680; /* Soft pastel yellow */
            color: #000; /* Black text for contrast */
            display: flex;
            height: 100vh;
            flex-direction: column;
        }

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            width: 100%;
            background-color: #fff; /* White for a clean look */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #ffcc66; /* Light yellow for sidebar */
            color: #000; /* Black text for visibility */
            padding: 30px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px 0 0 10px;
        }
        .sidebar .logo {
            text-align: center;
            margin: 20px 0;
        }

        .sidebar .logo img {
            max-width: 150px;
            cursor: pointer;
        }

        .sidebar h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            text-align: center;
            color: #000; /* Black heading */
        }

        .sidebar nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 15px;
        }

        .sidebar nav ul li a {
            text-decoration: none;
            color: #000; /* Black links */
            font-size: 1.1em;
            display: block;
            padding: 12px;
            border-radius: 8px;
            background-color: #ffa900; /* Bright orange for a vibrant feel */
            transition: background-color 0.3s ease, transform 0.2s;
        }

        .sidebar nav ul li a:hover {
            background-color: #ffa500; /* Slightly darker orange */
            color: #fff; /* White text on hover */
            transform: translateX(5px);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
            background-color: #fff; /* White for content clarity */
            border-radius: 0 10px 10px 0;
        }

        /* Section Titles */
        .section h1, .section h2 {
            color: #000; /* Black headings */
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        /* Cards */
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 30px;
        }

        .card {
            background-color: #ffa900; /* Orange for cards */
            color: #fff; /* White text for contrast */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            min-width: 220px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 1.5em;
            color: #fff; /* White headings for cards */
        }

        .card p {
            font-size: 1.2em;
            color: #fff; /* White descriptions for cards */
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #ffa500; /* Orange for table headers */
            color: #fff; /* White text */
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            background-color: #ffa500; /* Orange for buttons */
            color: #fff; /* White text */
            font-size: 1.1em;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        button:hover {
            background-color: #ffcc66; /* Lighter yellow on hover */
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
        <div class="logo">
                        <a href="index.php">
                            <img src="images/PETOPIA_logo1.png" alt="PETOPIA Logo">
                        </a>
                    </div>
            <h2>Petopia</h2>
            <nav>
                <ul>
                    <li><a href="#overview">Dashboard</a></li>
                    <li><a href="add_food.php">Add Food</a></li>
                    <li><a href="add_toys.php">Add Toys</a></li>
                    <li><a href="add_accessories.php">Add Accessories</a></li>
                    <li><a href="add_medicine.php">Add Medicine</a></li>
                  
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Overview Section -->
            <section id="overview" class="section">
                <h1>Dashboard Overview</h1>
                <div class="cards">
                    <div class="card">
                        <h3>Total Listings</h3>
                        <p><?php echo $total_pets; ?> Pets</p>
                    </div>
                    <div class="card">
                        <h3>Total Revenue</h3>
                        <p>$5,000</p>
                    </div>
                    <div class="card">
                        <h3>Pending Orders</h3>
                        <p>3</p>
                    </div>
                    <div class="card">
                        <h3>Upcoming Appointments</h3>
                        <p>2</p>
                    </div>
                </div>
            </section>

            <!-- More sections (Products, Transactions, etc.) can be added similarly -->
        </main>
    </div>
</body>

</html>

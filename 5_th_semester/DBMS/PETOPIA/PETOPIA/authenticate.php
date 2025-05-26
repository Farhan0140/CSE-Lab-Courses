<?php
session_start();

include('database.php'); // Include database connection


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data securely
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim($_POST['password']); // No need for mysqli_real_escape_string for password
    $role = trim(mysqli_real_escape_string($conn, $_POST['role']));

    // Check if database connection is successful
    if ($conn === false) {
        die("ERROR: Could not connect to the database.");
    }

    // Query to validate user
    $query = "SELECT * FROM users WHERE username = ? AND role = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if password matches
        if (password_verify($password, $user['password'])) {
            // Start session and store user data
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name']; // Assuming 'name' exists in the users table
            $_SESSION['role'] = $user['role'];

            // Redirect based on user role
            if ($role === 'customer') {
                header('Location: index.php');
                exit();
            } elseif ($role === 'seller') {
                header('Location: sellers_dashboard.php');
                exit();
            } elseif ($role === 'admin') {
                header('Location: admin_dashboard.php');
                exit();
            } else {
                echo "Invalid role specified.";
                exit();
            }
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // No user found
        echo "No user found with the given credentials.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

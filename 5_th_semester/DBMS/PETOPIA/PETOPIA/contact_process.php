<?php
// Include database connection
require_once('database.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Insert data into the customer_message table
    $query = "INSERT INTO customer_message (name, email, phone, service, message) 
              VALUES ('$name', '$email', '$phone', '$service', '$message')";

    if (mysqli_query($conn, $query)) {
        // Redirect to a thank you page or notify the user
        header('Location: contact_thank_you.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

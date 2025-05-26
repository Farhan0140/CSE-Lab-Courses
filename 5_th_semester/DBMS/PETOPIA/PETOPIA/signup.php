<?php
include('database.php'); // Include database connection

$error_message = ''; // Initialize error message
$username_error = ''; // Initialize username-specific error
$email_error = ''; // Initialize email-specific error
$success_message = ''; // Initialize success message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Use BINARY keyword for case-sensitive comparison
    $check_query = "SELECT username, email FROM users WHERE BINARY username = '$username' OR email = '$email'";
    $check_result = $conn->query($check_query);

    if ($check_result && $check_result->num_rows > 0) {
        $row = $check_result->fetch_assoc();

        if ($row['username'] === $username) {
            $username_error = "Username is taken.";
            $error_message = "Please correct the errors below.";
        } elseif ($row['email'] === $email) {
            $email_error = "Email is already taken.";
            $error_message = "Please correct the errors below.";
        }
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert new user
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
        if ($conn->query($sql) === TRUE) {
            $success_message = "Account created successfully! <a href='login.php' class='login-button'>Login</a>";
        } else {
            $error_message = "Error: Unable to create account. Please try again.";
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - PETOPIA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .create-account-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 20px;
        }

        .create-account-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, .form-group select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

        .login-button {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .login-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="create-account-container">
        <h1>Create Account</h1>

        <!-- Display error messages -->
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <!-- Display the form -->
        <form class="create-account-form" method="POST" action="">
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" placeholder="Enter your user name" required>
                <?php if (!empty($username_error)): ?>
                    <small class="error-message"><?php echo $username_error; ?></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <?php if (!empty($email_error)): ?>
                    <small class="error-message"><?php echo $email_error; ?></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select a role</option>
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="submit-button">Create Account</button>
        </form>

        <!-- Display success message -->
        <?php if (!empty($success_message)): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>

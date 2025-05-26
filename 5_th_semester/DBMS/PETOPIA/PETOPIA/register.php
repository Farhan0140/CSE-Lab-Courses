<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Save user to a placeholder file or database (simple example with file storage)
    $file = 'users.txt';
    $userData = $username . "," . $password . "," . $role . "\n";
    file_put_contents($file, $userData, FILE_APPEND);

    echo "Registration successful! <a href='login.php'>Log in</a>";
}
?>

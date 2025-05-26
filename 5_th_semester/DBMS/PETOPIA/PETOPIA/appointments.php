<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php'); // Redirect to login page if not an admin
    exit();
}

include('database.php'); // Include the database connection file

// Fetch appointments from the database
$sql = "SELECT appointment_id, user_id, pet_id, date, time, status FROM Appointments";
$result = $conn->query($sql);

if ($result === false) {
    die("ERROR: Could not execute query. " . $conn->error);
}

$appointments = [];
while ($appointment = $result->fetch_assoc()) {
    $appointments[] = $appointment;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Petopia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        .table th {
            background-color: #6c757d;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
        }
        .btn {
            font-weight: 500;
        }
        .back-arrow {
            font-size: 24px;
            color: white;
            text-decoration: none;
            background-color: #7C444F;
            border-radius: 50%;
            padding: 12px;
            width: 50px;
            height: 50px;
            display: inline-block;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .back-arrow:hover {
            background-color: #F39E60;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Back Arrow Button -->
        <div class="back-button">
        <a href="admin_dashboard.php" class="back-arrow"><i class="fas fa-arrow-left"></i></a>
        </div>

        <h1 class="text-center mb-4">Manage Appointments</h1>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>User ID</th>
                    <th>Pet ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment['appointment_id']); ?></td>
                        <td><?= htmlspecialchars($appointment['user_id']); ?></td>
                        <td><?= htmlspecialchars($appointment['pet_id']); ?></td>
                        <td><?= htmlspecialchars($appointment['date']); ?></td>
                        <td><?= htmlspecialchars($appointment['time']); ?></td>
                        <td><?= htmlspecialchars($appointment['status']); ?></td>
                        <td>
                            <a href="edit_appointment.php?id=<?= urlencode($appointment['appointment_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_appointment.php?id=<?= urlencode($appointment['appointment_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

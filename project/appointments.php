<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Appointments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Dr. Daisy</h2>
            <ul>
                <li><a href="doctor.php">Dashboard</a></li>
                <li><a href="appointments.php" class="active">Appointments</a></li>
                <li><a href="approved_appointments.php">Approved</a></li>
            </ul>
        </div>
        <a href="login.php" class="logout">Logout</a>
    </div>

    <div class="main">
        <h1>Appointments</h1>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Appointment Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, full_name, email, appointment_date, description, status FROM appointments";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['appointment_date']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['status']}</td>
                                <td>";
                                
                        // Show approve button only if status is Pending
                        if ($row['status'] === 'Pending') {
                            echo "<form action='approve_appointment.php' method='post'>
                                    <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                    <input type='submit' value='Approve'>
                                  </form>";
                        } else {
                            echo "✔";
                        }

                        echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No appointments found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

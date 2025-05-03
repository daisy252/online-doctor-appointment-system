<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Approved Appointments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Dr. Daisy</h2>
            <ul>
                <li><a href="doctor.php">Dashboard</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="approved_appointments.php" class="active">Approved</a></li>
            </ul>
        </div>
        <a href="login.php" class="logout">Logout</a>
    </div>

    <div class="main">
        <h1>Approved Appointments</h1>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Appointment Date</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                $sql = "SELECT a.id, a.full_name, a.email, a.appointment_date, a.description, a.status 
                        FROM appointments a 
                        WHERE a.status = 'Approved'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['appointment_date']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No approved appointments found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

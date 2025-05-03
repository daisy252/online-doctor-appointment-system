<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="sidebar">
        <div>
            <h2>Dr. Daisy</h2>
            <ul>
                <li><a href="doctor.php" class="approved">Dashboard</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="approved_appointments.php" class="approved">Approved</a></li>
               
            </ul>
        </div>
        <a href="login.php" class="logout">Logout</a>
    </div>

    <div class="main">
        <header>
            <h1>Dashboard</h1>
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search patients..." />
            </div>
        </header>

        <div class="stats">
    <?php
            include 'db.php';
            session_start();

            // Fetch total appointments
            $totalAppointmentsSql = "SELECT COUNT(*) as total FROM appointments";
            $totalAppointmentsResult = $conn->query($totalAppointmentsSql);
            $totalAppointments = $totalAppointmentsResult->fetch_assoc()['total'];

            // Fetch approved appointments
            $approvedAppointmentsSql = "SELECT COUNT(*) as approved FROM appointments WHERE status='Approved'";
            $approvedAppointmentsResult = $conn->query($approvedAppointmentsSql);
            $approvedAppointments = $approvedAppointmentsResult->fetch_assoc()['approved'];

            // Fetch pending appointments
            $pendingAppointmentsSql = "SELECT COUNT(*) as pending FROM appointments WHERE status='Pending'";
            $pendingAppointmentsResult = $conn->query($pendingAppointmentsSql);
            $pendingAppointments = $pendingAppointmentsResult->fetch_assoc()['pending'];

            echo "<div class='card'>
                    <h3>Total Appointments</h3>
                    <strong>$totalAppointments</strong>
                  </div>
                  <div class='card'>
                    <h3>Approved Appointments</h3>
                    <strong>$approvedAppointments</strong>
                  </div>
                  <div class='card'>
                    <h3>Pending Appointments</h3>
                    <strong>$pendingAppointments</strong>
                  </div>";
            ?>
        </div>

        <h2>Upcoming Appointments</h2>
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
                // Fetch appointments from the database
                $appointmentsSql = "SELECT a.id, a.full_name, a.email, a.appointment_date, a.description, a.status FROM appointments a";
                $appointmentsResult = $conn->query($appointmentsSql);

                if ($appointmentsResult->num_rows > 0) {
                    while ($row = $appointmentsResult->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['appointment_date']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['status']}</td>
                                <td>
                                    <form action='approve_appointment.php' method='post'>
                                        <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                        <input type='submit' value='Approve'>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No appointments found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="script.js"></script>
</body>
</html>
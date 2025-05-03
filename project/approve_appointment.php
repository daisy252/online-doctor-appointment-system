<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = intval($_POST['appointment_id']);
    $sql = "UPDATE appointments SET status = 'Approved' WHERE id = $appointment_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: doctor.php"); 
        
        exit();
    } else {
        echo "<script>alert('Approved successfully');</script>";

    }
}
    else {
        echo "<script>alert('Already approved');</script>";

    }



$conn->close();
?>

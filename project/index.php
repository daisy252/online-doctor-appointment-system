<?php
session_start();
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $appointment_date = $_POST['appointment_date'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];

    // Optional: If not logged in, use 0 as guest
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO appointments (user_id, full_name, email, phone, appointment_date, description, status) 
                            VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
    $stmt->bind_param("isssss", $user_id, $full_name, $email, $phone, $appointment_date, $description);

    if ($stmt->execute()) {
        echo "<script>alert('Appointment booked successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Doctor Appointment</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <!-- header navbar section start  -->

    <header>

        <!-- logo name  -->
        <a href="#" class="logo"><span>Doctor <span>Appointment.</a>

        <!-- navbar link  -->
        <nav class="navbar">
            <ul>
                <li><a href="#home">home</a></li>
                <li><a href="#doctor">doctor</a></li>
                <li><a href="#book">book</a></li>
                <li><a href="login.php" class="button">DocLogin</a></li>
            </ul>
        </nav>

        <div class="fas fa-bars"></div>
    </header>
    <!-- header navbar section end  -->

    <!-- home section start  -->

    <section id="home" class="home">

        <div class="row">

            <!-- home images  -->
            <div class="images">
                <img src="images/home.png" alt="">
            </div>

            <!-- home heading  -->
            <div class="content">
                <h1><span>Make an appointment today.</h1>
                <p>Stay safe with us all day.</p>
                <a href="#"><button class="button">read more</button></a>
            </div>
        </div>
    </section>
    <!-- home section end  -->

    <!-- card section start  -->

    <section id="doctor" class="card">

        <div class="container">

            <h1 class="heading">doctors</h1>
            <h3 class="title">our professional doctors</h3>

            <div class="box-container">

                <!-- start here  -->
                <div class="box">
                    <img src="./images/doctor1.png" alt="">
                    <div class="content">
                        <a href="#">
                            <h2>Daisy</h2>
                        </a>
                        <p>professional</p>

                        <!-- card icons  -->
                        <div class="icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
                <!-- end here  -->

                <!-- start here  -->
                <div class="box">
                    <img src="./images/doctor2.png" alt="">
                    <div class="content">
                        <a href="#">
                            <h2>Ankunda</h2>
                        </a>
                        <p>professional</p>

                        <!-- card icons  -->
                        <div class="icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
                <!-- end here  -->

                <!-- start here  -->
                <div class="box">
                    <img src="./images/doctor3.png" alt="">
                    <div class="content">
                        <a href="#">
                            <h2>Honest</h2>
                        </a>
                        <p>professional</p>

                        <!-- card icons  -->
                        <div class="icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div>
                    </div>
                </div>
                <!-- end here  -->

            </div>
        </div>
    </section>
    <!-- card section end  -->

    <!-- Booking section start  -->

    <section id="book" class="book">

        <h1 class="heading">book now</h1>
        <h3 class="title">Make an appointment now</h3>

        <div class="row">

            <!-- form images  -->
            <div class="images">
                <img src="./images/form.png" alt="">
            </div>

            <div class="form-container">
                <form action="index.php" method="post">
                    <input type="text" placeholder="Full Name" name="full_name" required>
                    <input type="email" placeholder="Enter Your Email" name="email" required>
                    <input type="datetime-local" placeholder="Date and Time to Meet" name="appointment_date" required>
                    <input type="number" placeholder="Phone" name="phone" required>
                    <textarea placeholder="Describe Your Situation" name="description" cols="30" rows="10" required></textarea>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>

    </section>
    <!-- book section end  -->

    <!-- footer section start  -->

    <section class="footer">

        <div class="box">
            <h2 class="logo"><span>Doctor <span>Appointment</h2>
            <p>Thank you for using our services</p>
        </div>

        <div class="box">
            <h2 class="logo"><span>S</span>hare</h2>
            <a href="#">facebook</a>
            <a href="#">twitter</a>
            <a href="#">instagram</a>
        </div>

        <div class="box">
            <h2 class="logo"><span>L</span>inks</h2>
            <a href="#">home</a>
            <a href="#">Doctor</a>
            <a href="#">book</a>
        </div>

        <h1 class="credit">@ <span>doctorsappointment2025</span> all rights reserved.</h1>
    </section>
    <!-- footer section end  -->

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- custom js file link  -->
    <script src="./js/main.js"></script>

    

</body>

</html>
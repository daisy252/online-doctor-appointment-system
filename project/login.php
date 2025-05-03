
<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DA - Login Page</title>
	   <!-- font awesome cdn link  -->
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

	   <!-- custom css file link  -->
	   <link rel="stylesheet" href="./css/style.css">
       <link rel="stylesheet" href="./css/style2.css">
</head>
<body class="simple-page">
	<div id="back-to-home">
		<a href="index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">
			
				<span style="color: white"><i class="fa fa-gg"></i></span>
				<span style="color: white">DA</span>
			
		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
	<h4 class="form-title m-b-xl text-center">Sign In With Your DA Account</h4>

    <form action="login.php" method="post">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Enter Registered Email ID" required="true" name="email">
		</div>

		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" required="true">
		</div>

		
		<input type="submit" class="btn btn-primary" name="login" value="Sign IN">
	</form>
	<hr />
	
	
</div><!-- #login-form -->




	</div><!-- .simple-page-wrap -->
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


	<h1 class="credit">@ <span>doctorsappointment2025</span> all right reserved.</h1>
</section>

<!-- footer section end  -->


<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            header("Location: doctor.php");
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.');</script>";
    }
}

$conn->close();
?>

<!-- custom js file link  -->
<script src="./js/main.js"></script>
</body>

</html>
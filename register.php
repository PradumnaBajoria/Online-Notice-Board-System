<!doctype html>
<html lang="en">
  <head>
  	<title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<!--<h2 class="heading-section">Online Notice Board</h2>-->
						<center><img src="images/online notice board 2.png" style="width:400px;height:100px;"></img></center>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="login-wrap p-4 p-md-5">
			      			<div class="icon d-flex align-items-center justify-content-center">
			      				<span class="fa fa-user-o"></span>
			      			</div>
			      			<h3 class="text-center mb-4">Registration Page</h3>
							<form action="register.php" class="login-form" method="post">
			      				<div class="form-group">
			      					<input type="text" name="fname" class="form-control rounded-left" placeholder="Enter Your First Name" required>
			      				</div>
		            			<div class="form-group d-flex">
		              				<input type="text" name="lname" class="form-control rounded-left" placeholder="Enter Your Last Name" required>
		            			</div>
		            			<div class="form-group">
			      					<input type="email" name="email" class="form-control rounded-left" placeholder="Enter Your Email ID" required>
			      				</div>
			      				<div class="form-group">
			      					<input type="password" name="password" class="form-control rounded-left" placeholder="Enter Your Password" required>
			      				</div>
			      				<div class="form-group">
			      					<select type="text" name="branch" class="form-control rounded-left" required>
			      						<option>-- Select Your Branch --</option>
			      						<option>Computer Science</option>
			      						<option>Electronics & Communication</option>
			      						<option>Electrical Engineering</option>
			      						<option>Mechanical Engineering</option>
			      						<option>Civil Engineering</option>
			      						<option>Chemical Engineering</option>
			      					</select>
			      				</div>
		            			<div class="form-group">
		            				<button type="submit" name="register" class="form-control btn btn-primary rounded submit px-3">Register</button>
		            			</div>
		            			<div class="form-group d-md-flex">
		            				<div class="w-50">
		            					<label class="temp"></label>
									</div>
									<div class="w-50 text-md-right">
										<a href="index.php">Click Here To Login</a>
									</div>
		            			</div>
		          			</form>
		        		</div>
					</div>
				</div>
			</div>
		</section>

		  <script src="js/jquery.min.js"></script>
  		<script src="js/popper.js"></script>
  		<script src="js/bootstrap.min.js"></script>
  		<script src="js/main.js"></script>

  		<?php
		    $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		    //$db = mysqli_select_db($connection, "Online_Notice_System");

		    if(isset($_POST["register"]))
		    {
		      	$query = "insert into users values('$_POST[fname]', '$_POST[lname]', '$_POST[branch]', '$_POST[email]', '$_POST[password]')";
		      	$query_run = mysqli_query($connection, $query);
		      	if($query_run)
		      	{
		        	echo "<script>alert('Registration Sucessful : You may Login Now');
		        	window.location.href = 'index.php';
		        	</script>";
		      	}
		      	else
		      	{
		        	echo "<script>alert('Registration Failed : Try Again');
		        	window.location.href = 'register.php';
		        	</script>";
		      	}
		    }
    	?>
	</body>
</html>

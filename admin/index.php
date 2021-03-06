<!doctype html>
<html lang="en">
  <head>
  	<title>Admin login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">




	</head>
	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<!--<h2 class="heading-section">Online Notice Board</h2>-->
						<center><img src="online notice board 2.png" style="width:400px;height:100px;"></img></center>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="login-wrap p-4 p-md-5">
			      			<div class="icon d-flex align-items-center justify-content-center">
			      				<span class="fa fa-user-o"></span>
			      			</div>
			      			<h3 class="text-center mb-4">Admin Login Page</h3>
							<form action="index.php" class="login-form" method="post">
			      				<div class="form-group">
			      					<input type="text" name="email" class="form-control rounded-left" placeholder="Enter Your Email ID" required>
			      				</div>
		            			<div class="form-group d-flex">
		              				<input type="password" name="password" class="form-control rounded-left" placeholder="Enter Your Password" required>
		            			</div>
		            			<div class="form-group">
		            				<button type="submit" name="login" class="form-control btn btn-primary submit px-3">Login</button>
		            			</div>
		            			<div class="form-group d-md-flex">
		            				<div class="w-50">
		            					<label class="temp"></label>
		            				</div>
									<div class="temp">

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
		    session_start();
		    $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		    //$db = mysqli_select_db($connection, "online_notice_system");

		    if(isset($_POST["login"]))
		    {
		      	$query = "select * from admin where email = '$_POST[email]' AND password = '$_POST[password]'";
		      	$query_run = mysqli_query($connection, $query);
		      	if(mysqli_num_rows($query_run))
		      	{
		        	$_SESSION['email'] = $_POST['email'];
		        	while($row = mysqli_fetch_assoc($query_run))
		        	{
		          		echo "<script>window.location.href = 'admin_dashboard.php'</script>";
		        	}
		      	}
		      	else
		      	{
		        	echo "<script>alert('Login Failed : Check Email or password');
		        	window.location.href = 'index.php';
		        	</script>";
		      	}
		    }
    	?>
	</body>
</html>

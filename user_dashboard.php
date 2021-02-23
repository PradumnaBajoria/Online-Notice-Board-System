
<?php
	session_start();
	if(isset($_POST['update_profile'])){
		$connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		$query = "update users set fname = '$_POST[fname]', lname = '$_POST[lname]', branch = '$_POST[branch]', email = '$_POST[email]', password = '$_POST[password]' where email = '$_SESSION[email]'";
		$query_run = mysqli_connect($connection, $query);

		if($query_run){
			echo "<script type = 'text/javascript'>alert(Profile Updated); window.location.href = 'user_dashboard.php'</script>";
		}else{
			echo "<script type = 'text/javascript'>alert(Updation Failed); window.location.href = 'user_dashboard.php'</script>";
		}

	}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>User Dashboard</title>
		<!-- Bootstrap file -->
		<script src="jQuery/juqery_latest.js" charset="utf-8"></script>
		<link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
		<script src="bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

		<!-- CSS File -->
		<link rel="stylesheet" type = "text/css" href="css/style.css">


		<script type="text/javascript">
      $(document).ready(function(){
        $("#edit_profile_button").click(function(){
          $("#main_content").load('edit_profile.php');
        });

        $("#view_notice_button").click(function(){
          $("#main_content").load('view_notice.php');
        });

      });
    </script>

	</head>
	<body>

		<!-- Header -->
		<div class="row" id = "header">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<h3>Online Notice Board System</h3>
			</div>
			<div class="col-md-4">

			</div>

		</div>
		<br>
		<!-- User Dashboard main system -->
		<section id = "dashboard">

			<div class="row">
				<div class="col-md-2" id = "left_sidebar">

					<img src="images/img1.jpg" class="img-rounded" alt="Image_user" height="200px" width="200px"><br>
					<b> <?php echo $_SESSION['email']; ?></b><hr>
					<button type="button" class="btn btn-primary btn-block" id="edit-profile-button" name="edit">Edit Profile</button>
					<button type="button" class="btn btn-primary btn-block" id="view-notice-button" name="view">View All Notice</button>
					<a href="index.php" type="button" class="btn btn-success btn-block">Logout</a>

				</div>
				<div class="col-md-8" id="main_content">
					<h2>User Dashboard</h2>
					<p>Hey There! This is your own Dashboard.</p>
					<p>Hey There! This is your own Dashboard.</p>
					<p>Hey There! This is your own Dashboard.</p>
				</div>

			</div>

		</section>



	</body>
</html>

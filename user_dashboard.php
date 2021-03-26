
<?php
	session_start();
	if(isset($_POST['update_profile'])){
		$connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		$query = "update users set password = '$_POST[password]' where email = '$_SESSION[email]'";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo "<script type = 'text/javascript'>
			alert('Profile Updated');
			window.location.href = 'user_dashboard.php'
			</script>";
		}else{
			echo "<script type = 'text/javascript'>alert('Updation Failed'); window.location.href = 'user_dashboard.php'</script>";
		}

	}

	if(isset($_POST['send_query'])){
		$connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		$query = "insert into help values(null, '$_SESSION[email]', '$_POST[title]', '$_POST[message]', '$_POST[date]', 'No Reply Yet')";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo "<script type = 'text/javascript'>
			alert('Query Posted');
			window.location.href = 'user_dashboard.php'
			</script>";
		}else{
			echo "<script type = 'text/javascript'>alert('Failed, Try Again'); window.location.href = 'user_dashboard.php'</script>";
		}
	}

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>User Dashboard</title>
		<!-- Bootstrap file -->
		<script src="jQuery/jquery_latest.js" charset="utf-8"></script>
		<!-- <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css"> -->
		<script src="bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

		<!-- CSS File -->
		<link rel="stylesheet" type = "text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type = "text/css" href="css/style1.css">


		<script type="text/javascript">
      $(document).ready(function(){
        $("#edit-profile-button").click(function(){
          $("#main_content").load('edit_profile.php');
        });

        $("#view-notice-button").click(function(){
          $("#main_content").load('view_notice.php');
        });

				$("#view-reply-button").click(function(){
          $("#main_content").load('view_reply.php');
        });

				$("#view-help-button").click(function(){
          $("#main_content").load('help_support.php');
        });

				// $("#reply-button").click(function(){
        //   $("#main_content").load('reply.php');
        // });

      });
    </script>

	</head>
	<body style="background-image: url('images/bg2.jpg');">
		<!-- Header -->
		<div class="row" id = "header">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<center><img src="images/online notice board 2.png" style="width:400px;height:100px;"></img></center>
			</div>
			<div class="col-md-4">

			</div>

		</div>
		<br>
		<!-- User Dashboard main system -->
		<section id = "dashboard">

			<div class="row">
				<div class="col-md-2" id = "left_sidebar">

					<center><h4>User Dashboard</h4></center>
					<img src="images/img1.jpg" class="img-rounded" alt="Image_user" height="200px" width="200px"><br>
					<b> <?php echo $_SESSION['email']; ?></b><hr>
					<button type="button" class="btn btn-primary btn-block" id="edit-profile-button" name="edit">Edit Profile</button>
					<button type="button" class="btn btn-primary btn-block" id="view-notice-button" name="view">View Notice</button>
					<button type="button" class="btn btn-primary btn-block" id="view-reply-button" name="reply">View Reply</button>
					<button type="button" class="btn btn-primary btn-block" id="view-help-button" name="help">Help and Support</button>
					<a href="logout.php" type="button" class="btn btn-success btn-block">Logout</a>

				</div>
				<div class="col-md-7 main" id="main_content">
					<center><h2>About Us</h2></center>
					<p></p>
					<p>This is your dashboard</p>



				</div>
				<div class="col-md-3" id = "right_sidebar">
					<script type="text/javascript">
						$("#right_sidebar").load('admin/view_event.php');
					</script>
				</div>

			</div>

		</section>


	</body>
</html>

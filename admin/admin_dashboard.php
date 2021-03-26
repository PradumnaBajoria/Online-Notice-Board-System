
<?php
	session_start();
	if(isset($_POST['update_profile'])){
		$connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		$query = "update admin set name = '$_POST[name]', email = '$_POST[email]', password = '$_POST[password]' where email = '$_SESSION[email]'";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo "<script type = 'text/javascript'> alert('Profile Updated'); window.location.href = 'admin_dashboard.php' </script>";
		}else{
			echo "<script type = 'text/javascript'>alert(Updation Failed); window.location.href = 'admin_dashboard.php'</script>";
		}

	}

  if(isset($_POST['send_notice'])){
		$connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		$query = "insert into notice values(null, '$_POST[post_date]', '$_POST[branch]', '$_POST[title]', '$_POST[message]')";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo "<script type = 'text/javascript'>
			alert('Notice Created');
			window.location.href = 'admin_dashboard.php'
			</script>";
		}else{
			echo "<script type = 'text/javascript'>alert('Notice Creation Failed'); window.location.href = 'admin_dashboard.php'</script>";
		}
	}

	if(isset($_POST['create_event'])){
		$connection = mysqli_connect("localhost", "root", "", "online_notice_system");
		$query = "insert into event values(null, '$_POST[event_date]', '$_POST[event_name]')";
		$query_run = mysqli_query($connection, $query);

		if($query_run){
			echo "<script type = 'text/javascript'>
			alert('Event Created');
			window.location.href = 'admin_dashboard.php'
			</script>";
		}else{
			echo "<script type = 'text/javascript'>alert('Notice Creation Failed'); window.location.href = 'admin_dashboard.php'</script>";
		}
	}

	// if(isset($_POST['help_reply'])){
	//
	// }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Admin Dashboard</title>
		<!-- Bootstrap file -->
		<script src="../jQuery/jquery_latest.js" charset="utf-8"></script>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

		<!-- CSS File -->
		<link rel="stylesheet" type = "text/css" href="../css/style1.css">


		<script type="text/javascript">
      $(document).ready(function(){
        $("#edit-profile-button").click(function(){
          $("#main_content").load('edit_profile.php');
        });

        $("#create-notice-button").click(function(){
          $("#main_content").load('create_notice.php');
        });

        $("#view-notice-button").click(function(){
          $("#main_content").load('view_all_notice.php');
        });

				$("#view-reply-button").click(function(){
          $("#main_content").load('view_all_reply.php');
        });

				$("#event-create-button").click(function(){
          $("#main_content").load('create_event.php');
        });

      });
    </script>

	</head>
	<body style="background-image: url('../images/bg2.jpg');">

		<!-- Header -->
		<div class="row" id = "header">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<center><img src="../images/online notice board 2.png" style="width:400px;height:100px;"></img></center>
				<center><h4>Admin Dashboard</h4></center>
			</div>
			<div class="col-md-4">

			</div>

		</div>
		<br>
		<!-- User Dashboard main system -->
		<section id = "dashboard">

			<div class="row">
				<div class="col-md-2" id = "left_sidebar">
					<center><h4>Admin Dashboard</h4></center>
					<img src="../images/img1.jpg" class="img-rounded" alt="Image_admin" height="200px" width="200px"><br>
					<b> <?php echo $_SESSION['email']; ?></b><hr>
					<button type="button" class="btn btn-primary btn-block" id="edit-profile-button" name="edit">Edit Profile</button>
          <button type="button" class="btn btn-primary btn-block" id="create-notice-button" name="edit">Create Notice</button>
          <button type="button" class="btn btn-primary btn-block" id="view-notice-button" name="view">View All Notice</button>
          <button type="button" class="btn btn-primary btn-block" id="view-reply-button" name="reply">View All Reply</button>

					<a href="logout.php" type="button" class="btn btn-success btn-block">Logout</a>

				</div>
				<div class="col-md-7" id="main_content">

					<script type="text/javascript">
						$("#main_content").load('help_support.php');
					</script>

				</div>
				<div class="col-md-3" id="right_sidebar">
					<div class="">
						<center><h2>Event Creation</h2></center>
						<button type="button" class="btn btn-success btn-block" id="event-create-button" name="event">Create Event</button>
					</div>
					<div id="event_show">
						<script type="text/javascript">
							$("#event_show").load('view_event.php');
						</script>
					</div>

				</div>

			</div>

		</section>



	</body>
</html>

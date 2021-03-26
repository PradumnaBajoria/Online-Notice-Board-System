<?php

  session_start();
  $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
  $query = "select * from help where email = '$_GET[q_email]' and title = '$_GET[q_title]'";
  $query_run = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($query_run)){
    $title = $row['title'];
    $message = $row['message'];
    $email = $row['email'];
  }

  if(isset($_POST["reply"])){
    $query2 = "update help set reply = '$_POST[reply_help]' where email = '$email' and title = '$title'";
    $query_run2 = mysqli_query($connection, $query2);
    if($query_run2){
      echo "<script>alert('Reply Sent');
      window.location.href = 'admin_dashboard.php';
      </script>";

    }else{
      echo "<script>alert('Failed : Try Again');
      window.location.href = 'admin_dashboard.php';
      </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reply to Notice</title>
    <script src="../jQuery/jquery_latest.js" charset="utf-8"></script>
		<script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

		<!-- CSS File -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type = "text/css" href="../css/style1.css">



  </head>
  <body style="background-image: url('../images/bg2.jpg');">

    <!-- Header -->
		<div class="row" id = "header">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<center><img src="../images/online notice board 2.png" style="width:400px;height:100px;"></img></center>
			</div>
			<div class="col-md-4">

			</div>

		</div>

    <center><h4>Reply to Query</h4></center>


    <br>
    <div>
      <form action="" method="post" id="reply_form_id">
        <div class="form-group">
          <label>Reply to : </label>
          <?php echo $email; ?>
        </div>
        <div class="form-group">
          <label>Query Title : </label>
          <?php echo $title; ?>
        </div>
        <div class="form-group">
          <label>Query : </label>
          <?php echo $message; ?>
        </div>
        <div class="form-group">
          <label>Reply : </label>
          <textarea name="reply_help" rows="4" cols="40" class="form-control" placeholder="Enter Message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="reply" name="reply">Reply</button>

      </form>
    </div>
  </body>
</html>

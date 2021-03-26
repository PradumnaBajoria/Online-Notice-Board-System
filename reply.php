<?php

  session_start();
  $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
  $query = "select * from users where email = '$_SESSION[email]'";
  $query_run = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($query_run)){
    $branch = $row['branch'];
  }

  $query1 = "select * from notice where title = '$_GET[m_title]' and (branch = '$branch' or branch = 'All')";
  $query_run1 = mysqli_query($connection, $query1);

  while($row = mysqli_fetch_assoc($query_run1)){
    $notice_id = $row['notice_id'];
    $title = $row['title'];
  }

  if(isset($_POST["send_reply"])){
    $query2 = "insert into reply values('$_SESSION[email]', '$branch', '$_POST[whom]', '$_POST[message]', '$notice_id', null, '$title')";
    $query_run2 = mysqli_query($connection, $query2);
    if($query_run2){
      echo "<script>alert('Reply Sent');
      window.location.href = 'user_dashboard.php';
      </script>";

    }else{
      echo "<script>alert('Failed : Try Again');
      window.location.href = 'user_dashboard.php';
      </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reply to Notice</title>
    <script src="jQuery/jquery_latest.js" charset="utf-8"></script>
		<!-- <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css"> -->
		<script src="bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

		<!-- CSS File -->
		<link rel="stylesheet" type = "text/css" href="css/style1.css">
    <link rel="stylesheet" type = "text/css" href="css/bootstrap.min.css">


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

    <center><h4>Reply to Notice</h4></center>


    <br>
    <div>
      <form action="" method="post" id="reply_form_id">
        <div class="form-group">
          <label>Reply to : </label>
          <select class="form-control" name="whom" required>
            <option value="All">All</option>
            <option value="<?php echo $branch; ?>"><?php echo $branch; ?></option>

          </select>
        </div>
        <div class="form-group">
          <label>Messege : </label>
          <textarea name="message" rows="4" cols="40" class="form-control" placeholder="Enter Message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="reply_button" name="send_reply">Reply</button>

      </form>
    </div>
  </body>
</html>

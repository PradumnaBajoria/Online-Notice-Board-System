<?php

  session_start();
  $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
  $query = "select * from users where email = '$_SESSION[email]'";
  $query_run = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($query_run)){
    $branch = $row['branch'];
  }

  $query1 = "select * from notice where branch = '$branch'";
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
		<link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
		<script src="bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

		<!-- CSS File -->
		<link rel="stylesheet" type = "text/css" href="css/style.css">


  </head>
  <body>
    <div id="header">
      <center><h4>Reply to Notice</h4></center>
    </div>

    <br>
    <div>
      <form action="" method="post">
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

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <center><h4>Queries of Students</h4></center>
    <br>
    <?php
      $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
      $query = "select * from help order by date desc";
      $query_run = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="class-text"><?php echo $row['message']; ?></p>
            <br>
            <h6 class="card-subtitle">From : <?php echo $row['email']; ?></h6>
            <h6 class="card-subtitle">Date : <?php echo $row['date']; ?></h6>
            <!-- <button type="button" class="btn btn-warning" id="help-reply-button" name="help_reply">Reply</button> -->
            <a href="help_support_reply.php?q_email=<?php echo $row['email'];?>&q_title=<?php echo $row['title'];?>" type="button" class="btn btn-danger">Reply</a>
          </div>

        </div>
        <?php
      }

     ?>
  </body>
</html>

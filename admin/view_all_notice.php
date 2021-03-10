<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <center><h4>All Notices</h4></center>
    <br>
    <?php
      $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
      $query = "select * from notice order by notice_id desc";
      $query_run = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="class-text"><?php echo $row['message']; ?></p>
            <br>
            <h6 class="card-subtitle">To : <?php echo $row['branch']; ?></h6>
            <h6 class="card-subtitle">Date : <?php echo $row['post_date']; ?></h6>

          </div>

        </div>
        <?php
      }

     ?>
  </body>
</html>

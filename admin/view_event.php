<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <center><h4>All Events</h4></center>
    <br>
    <?php
      $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
      $query = "select * from event order by event_id desc";
      $query_run = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <div class="card">
          <div class="card-body">
            <h5 class="class-subtitle"><?php echo $row['event_name']; ?></h5>
            <!-- <br> -->
            <p class="card-text">Date : <?php echo $row['date']; ?></p>

          </div>

        </div>
        <?php
      }

     ?>
  </body>
</html>

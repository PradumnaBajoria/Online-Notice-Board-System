<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br>
    <center><h4>Reply</h4></center>
    <br>
    <?php
      session_start();
      $connection = mysqli_connect("localhost", "root", "", "online_notice_system");

      $query1 = "select * from users where email = '$_SESSION[email]'";
      $query_run1 = mysqli_query($connection, $query1);

      while($row = mysqli_fetch_assoc($query_run1)){
        $branch = $row['branch'];
      }

      $query = "select * from reply where whom = '$branch' OR whom = 'ALL' order by reply_id desc";
      $query_run = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['notice_title']; ?></h5>
            <p class="class-text">From : <?php echo $row['email']; ?></p>
            <p class="class-text">Message : <?php echo $row['message']; ?></p>
            <br>
            <h6 class="card-subtitle">To : <?php echo $row['whom']; ?></h6>

          </div>

        </div>
        <?php
      }

     ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Help and Support</title>
  </head>
  <body>
    <center><h4>Help and Support</h4></center>
    <br>
    <center><h5>Ask New Queries</h5></center>
    <div>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Date : </label>
          <input type="date" class="form-control" name="date">
        </div>
        <div class="form-group">
          <label for="">Regarding : </label>
          <input type="text" class="form-control" name="title" value="" placeholder="Enter Subject Regarding Query">
        </div>
        <div class="form-group">
          <label>Query : </label>
          <textarea name="message" rows="4" cols="40" class="form-control" placeholder="Enter Query"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send_query">Send Query</button>

      </form>
    </div>
    <br>

    <center><h5>Previous Queries</h5></center>

    <?php
      session_start();
      $connection = mysqli_connect("localhost", "root", "", "online_notice_system");

      $query = "select * from help where email = '$_SESSION[email]' order by help_id desc";
      $query_run = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="class-text">Query : <?php echo $row['message']; ?></p>
            <p class="class-text">Reply : <?php echo $row['reply']; ?></p>
            <br>
          </div>

        </div>
        <?php
      }

     ?>

    <!--<center><h5>Ask New Queries</h5></center>
    <div>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Date : </label>
          <input type="date" class="form-control" name="date">
        </div>
        <div class="form-group">
          <label for="">Regarding : </label>
          <input type="text" class="form-control" name="title" value="" placeholder="Enter Subject Regarding Query">
        </div>
        <div class="form-group">
          <label>Query : </label>
          <textarea name="message" rows="4" cols="40" class="form-control" placeholder="Enter Query"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send_query">Send Query</button>

      </form>
    </div>-->
  </body>
</html>

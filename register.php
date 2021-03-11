<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Notice Board System</title>

    <!-- BOOTSTRAP FILE -->
    <link rel="stylesheet" type = "text/css" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script>

    <!-- CSS FILE -->
    <link rel="stylesheet" type = "text/css" href="css/style.css">
  </head>
  <body>
    <!--Header Section Starts-->
    <div class="row" id = "header">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <h3>Online Notice Board System</h3>
      </div>
      <div class="col-md-4">

      </div>
    </div>

    <!--Login Section Starts-->
    <section id = "login_form">
      <div class="row">
        <div class="col-md-4 m-auto block">
          <center><h4>Registration Form</h4></center>

          <form action="register.php" method="post">
            <div class="form-group">
              <label>First Name : </label>
              <input class="form-control" type = "text" name = "fname" placeholder = "Enter Your First Name" required>
            </div>
            <div class="form-group">
              <label>Last Name : </label>
              <input class="form-control" type = "text" name = "lname" placeholder = "Enter Your Last Name" required>
            </div>
            <div class="form-group">
              <label>Branch : </label>
              <select class="form-control" name="branch" required>
                <option value="Computer Science">Computer Science</option>
                <option value="Electronics">Electronics</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Electrical">Electrical</option>
                <option value="Civil">Civil</option>
                <option value="Chemical">Chemical</option>

              </select>
            </div>
            <div class="form-group">
              <label>Email Id : </label>
              <input class="form-control" type = "text" name = "email" placeholder = "Enter Your Email" required>
            </div>
            <div class="form-group">
              <label>Password : </label>
              <input class="form-control" type = "password" name = "password" placeholder = "Enter Your Password" required>
            </div>

            <button class = "btn btn-primary" type="submit" name="register">Register</button>

          </form>
          <a href="index.php">Click Here to Login</a>
        </div>
      </div>
    </section>

    <?php

    $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
    //$db = mysqli_select_db($connection, "Online_Notice_System");

    if(isset($_POST["register"])){
      $query = "insert into users values('$_POST[fname]', '$_POST[lname]', '$_POST[branch]', '$_POST[email]', '$_POST[password]')";
      $query_run = mysqli_query($connection, $query);
      if($query_run){
        echo "<script>alert('Registration Sucessful : You may Login Now');
        window.location.href = 'index.php';
        </script>";

      }else{
        echo "<script>alert('Registration Failed : Try Again');
        window.location.href = 'register.php';
        </script>";
      }

    }

    ?>

  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Notice Board System</title>

    <!-- BOOTSTRAP FILE -->
    <link rel="stylesheet" type = "text/css" href="bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <!-- <script src="bootstrap-4.6.0-dist/js/bootstrap.min.js" charset="utf-8"></script> -->

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
          <center><h4>Login Form</h4></center>

          <form action="index.php" method="post">
            <div class="form-group">
              <label>Email Id : </label>
              <input class="form-control" type = "text" name = "email" placeholder = "Enter Your Email">
            </div>
            <div class="form-group">
              <label>Password : </label>
              <input class="form-control" type = "password" name = "password" placeholder = "Enter Your Password">
            </div>

            <button class = "btn btn-primary" type="submit" name="login">Login</button>

          </form>
          <a href="register.php">Click Here to Register</a>
        </div>
      </div>
    </section>

    <?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
    //$db = mysqli_select_db($connection, "online_notice_system");

    if(isset($_POST["login"])){
      $query = "select * from users where email = '$_POST[email]' AND password = '$_POST[password]'";
      $query_run = mysqli_query($connection, $query);
      if(mysqli_num_rows($query_run)){
        $_SESSION['email'] = $_POST['email'];
        while($row = mysqli_fetch_assoc($query_run)){
          echo "<script>window.location.href = 'user_dashboard.php'</script>";
        }
      }else{
        echo "<script>alert('Login Failed : Check Email or password');
        window.location.href = 'index.php';
        </script>";
      }

    }

    ?>

  </body>
</html>

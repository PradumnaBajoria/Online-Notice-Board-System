<?php
  session_start();
  $connection = mysqli_connect("localhost", "root", "", "online_notice_system");
  $query = "select * from users where email = '$_SESSION[email]'";
  $query_run = mysqli_query($connection, $query);

  $fname = "";
  $lname = "";
  $branch = "";
  $email = "";
  $password = "";

  while ($row = mysqli_fetch_assoc($query_run)) {

    $fname = $row['fname'];
    $lname = $row['lname'];
    $branch = $row['branch'];
    $email = $row['email'];
    $password = $row['password'];

  }

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="" method="post">
       <div class="form-group">
         <label>First Name : </label>
         <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>" disabled>
       </div>
       <div class="form-group">
         <label>Last Name : </label>
         <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" disabled>
       </div>
       <div class="form-group">
         <label>Branch : </label>
         <input type="text" class="form-control" name="branch" value="<?php echo $branch; ?>" disabled>
         <!--<select class="form-control" name="branch" dis>
           <option value="Computer Science">Computer Science</option>
           <option value="Electronics">Electronics</option>
           <option value="Mechanical">Mechanical</option>
           <option value="Electrical">Electrical</option>
           <option value="Civil">Civil</option>
           <option value="Chemical">Chemical</option>

         </select>-->
       </div>
       <div class="form-group">
         <label>Email : </label>
         <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" disabled>
       </div>
       <div class="form-group">
         <label>Password : </label>
         <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
       </div>

       <button type="submit" name="update_profile" class="btn btn-primary">Update</button>

     </form>
   </body>
 </html>

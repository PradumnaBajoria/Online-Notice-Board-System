<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Notice</title>
  </head>
  <body>
    <center><h4>Create Notice</h4></center>
    <br>
    <div>
      <form action="" method="post">
        <div class="form-group">
          <label>Branch : </label>
          <select class="form-control" name="branch" required>
            <option value="All">All</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Electronics">Electronics</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Electrical">Electrical</option>
            <option value="Civil">Civil</option>
            <option value="Chemical">Chemical</option>

          </select>
        </div>
        <div class="form-group">
          <label for="">Post Date : </label>
          <input type="date" class="form-control" name="post_date">
        </div>
        <div class="form-group">
          <label for="">Subject : </label>
          <input type="text" class="form-control" name="title" value="" placeholder="Enter Subject">
        </div>
        <div class="form-group">
          <label>Messege : </label>
          <textarea name="message" rows="4" cols="40" class="form-control" placeholder="Enter Message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send_notice">Send Notice</button>

      </form>
    </div>
  </body>
</html>

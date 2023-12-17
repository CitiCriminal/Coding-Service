<?php 
include 'includes/config.php';
session_start();

if(isset($_SESSION['user'])){
  header("Location: dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Admin Panel</title>
</head>
<body data-bs-theme="dark">
  <div class="content">
    <form method="POST">
      <?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
        $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));

        $sql = "SELECT username, password FROM settings WHERE id = '1'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            if($name == $row['username']){
              if($password == $row['password']){
                $_SESSION['user'] = "root";
                header("Location: dashboard");
              }
            }
          }
        }
      }
      ?>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <br>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
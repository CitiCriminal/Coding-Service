<?php 
include 'includes/config.php';
session_start();

if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">  
    <title>Support</title>
</head>
<body data-bs-theme="dark">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
          <span class="fs-4">Neo</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="dashboard" class="nav-link text-white" aria-current="page">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
              Home
            </a>
          </li>
          <li>
            <a href="support" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
              support
            </a>
          </li>
          <li>
            <a href="customers" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Customers
            </a>
          </li>
        </ul>
        <hr>
      </div>
      <br>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="table-responsive">
              <table class="table table-striped table-striped-columns table-sm">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Text</th>
                    <th scope="col">Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM contact ORDER BY id DESC";
                  $result = mysqli_query($conn, $sql);

                  if(mysqli_num_rows($result) > 0){
                    while($supportlist = mysqli_fetch_assoc($result)){?>
                  <tr>
                    <td><?php echo $supportlist['id']; ?></td>
                    <td><?php echo $supportlist['name']; ?></td>
                    <td><?php echo $supportlist['email']; ?></td>
                    <td><?php echo $supportlist['text']; ?></td>
                    <td><?php echo $supportlist['timest']; ?></td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
    </main>
</body>
</html>
<?php 
}else{
  header("Location: index");
}
?>
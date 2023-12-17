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
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
              Support
            </a>
          </li>
          <li>
            <a href="customers" class="nav-link active">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Customers
            </a>
          </li>
        </ul>
        <hr>
      </div>
      <br>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="create-panel">
            <form method="POST">
              <?php 
              if(isset($_POST['submit'])){
                $clientmail = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['clientmail']));
                $clientstatus = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['status']));
                $worker = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['working']));
                $date = date('Y-m-d H:i:s A');

                $sql = "INSERT INTO customers(clientmail, status, worker, timest) VALUES ('".$clientmail."', '".$clientstatus."', '".$worker."', '".$date."')";
                $result = mysqli_query($conn, $sql);
                header("Location: customers");
                $_SESSION['status'] = "success";
                exit();
              }
              ?>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Client Mail Address</label>
                  <input type="email" name="clientmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <label for="exampleInputEmail1" class="form-label">Status</label>
                  <select name="status" class="form-select" id="inputGroupSelect01">
                    <option value="working on">Working On</option>
                    <option selected value="unactive">Unactive</option>
                  </select>
                  <label for="exampleInputEmail1" class="form-label">Whos Working On it:</label>
                  <select name="working" class="form-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="USER 1">USER 1</option>
                    <option value="USER 2">USER 2</option>
                  </select>

                </div>
                <button type="submit" name="submit" class="btn btn-primary">Create Customer</button>
              </form>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="table-responsive">
              <table class="table table-striped table-striped-columns table-sm">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Worker</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM customers ORDER BY id DESC";
                  $result = mysqli_query($conn, $sql);

                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){?>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['clientmail']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['worker']; ?></td>
                    <td><?php echo $row['timest']; ?></td>
                    <td><a style="color:red;" href="delete.php?id=<?php echo $row['id']; ?>"><i title="delete" class="fa-solid fa-trash"></i></a><a href="workingon.php?id=<?php echo $row['id']; ?>" style="color:green;"><i title="change to Working On" class="fa-solid fa-laptop"></i></a><a href="unactive.php?id=<?php echo $row['id']; ?>" style="color:yellow;"><i title="change to Unactive" class="fa-solid fa-bed"></i></a></td>
                  </tr>
                  <?php }
                  }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/ba23ae2d89.js" crossorigin="anonymous"></script>

    <?php 
    if(isset($_SESSION['status']) == "success"){
            ?>
            <script>
                Swal.fire(
                  'Done!',
                  'Changes has been done!',
                  'success'
                );
            </script>
    <?php 
    unset($_SESSION['status']);
    }
    ?>
</body>
</html>
<?php 
}else{
  header("Location: index");
}
?>
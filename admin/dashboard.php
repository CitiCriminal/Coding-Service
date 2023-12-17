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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
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
            <a href="dashboard" class="nav-link active" aria-current="page">
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
            <a href="customers" class="nav-link text-white">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
              Customers
            </a>
          </li>
        </ul>
        <hr>
      </div>
      <div class="chart">
        <canvas id="myChart"></canvas>
      </div>      
      
      <?php 
      // Get the current date
      $startOfWeek = date('Y-m-d', strtotime('monday this week'));
      $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
       
      // Get the logged-in user's email from the session (replace with your own session variable)
      $userEmail = $_SESSION['user'];

      // Query to retrieve the count of pings that resulted in "Website is offline" for each day for the logged-in user
// Query to retrieve the count of pings that resulted in "Website is offline" for each day of the week for the logged-in user
$sql = "SELECT DATE(timest) AS pingDate, COUNT(*) AS pingCount 
        FROM contact 
        WHERE DATE(timest) BETWEEN '$startOfWeek' AND '$endOfWeek' 
        GROUP BY pingDate";
      $result = mysqli_query($conn, $sql);

      // Prepare data for the Chart.js chart
      $labels = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
      $data = array_fill(0, 7, 0);

      // Process the retrieved data
      while ($row = mysqli_fetch_assoc($result)) {
          $pingDate = date('N', strtotime($row['pingDate'])); // Get the day of the week (1 - Monday, 7 - Sunday)
          $pingCount = (int)$row['pingCount'];
          $data[$pingDate - 1] = $pingCount; // Subtract 1 to match the array index
      }

      $labelsJSON = json_encode($labels);
      $dataJSON = json_encode($data);
      
    ?>
<script>
  const ctx = document.getElementById('myChart');
  Chart.defaults.font.size = 15;
  Chart.defaults.color = '#fff';
  Chart.defaults.font.family = 'Quantico';

  // Use the PHP variables within the JavaScript code
  const labels = <?php echo $labelsJSON; ?>;
  const data = <?php echo $dataJSON; ?>;

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: '# Contact Messages',
        data: data,
        borderWidth: 3,
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        borderColor: 'rgba(255, 99, 132, 1)'
      }]
    },
    options: {
      responsive: true,
      interaction: {
        intersect: false
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Value'
          },
          suggestedMin: 0,
          suggestedMax: 6
        }
      }
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
<?php 
}else{
  header("Location: index");
}
?>
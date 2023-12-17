<?php 
include 'includes/config.php';
session_start();

if(isset($_SESSION['user'])){

// Validate and sanitize the ID from the URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    // Handle invalid or missing ID
    exit('Invalid ID.');
}

$newStatus = "unactive"; // Replace this with the new value for the status column
$sql = "UPDATE customers SET status = '$newStatus' WHERE id = $id";
$result = mysqli_query($conn, $sql);
$_SESSION['status'] = "unactive";
header("Location: customers.php");
exit();
}
?>
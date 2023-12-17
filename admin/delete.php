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

$sql = "DELETE FROM customers WHERE id = $id";
$result = mysqli_query($conn, $sql);
$_SESSION['status'] = "delete";
header("Location: customers.php");
exit();
}
?>
<?php
include '../../database/config.php';
////////////////////////////////////session
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
  // Redirect to login page or other appropriate page
  header("Location: ../login.php");
  exit();
}
////////////////////////////////////end session

if($_GET['page'] == 'product'){
  $query = "DELETE FROM product WHERE product_id = {$_GET['id']}";
  $sql = mysqli_query($conn,$query);
  header("Location:../products.php");
}else if($_GET['page'] == 'client'){
  $query = "DELETE FROM client WHERE client_id = {$_GET['id']}";
  $sql = mysqli_query($conn,$query);
  header("Location:../clients.php");
}else if($_GET['page'] == 'order'){
  $query = "DELETE FROM `order` WHERE order_id = {$_GET['id']}";
  $sql = mysqli_query($conn,$query);
  header("Location:../orders.php");
}


?>
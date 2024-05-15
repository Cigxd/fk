<?php
include '../database/config.php';
////////////////////////////////////session
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
  // Redirect to login page or other appropriate page
  header("Location: ../login.php");
  exit();
}
////////////////////////////////////end session

$sql = "SELECT username FROM admin WHERE id = 1";
$admin = $conn->query($sql);
$row = $admin->fetch_assoc();

// `product_id`, `sub_category_id`, `name`, `mineral_envirement`, `fossile_period`, `rock_type`, `price`, `quantity`, `created_date`, `image`, `qr_code`

$products_sql = "SELECT product.*, sub_category.name AS 'sub_category' FROM product
                LEFT JOIN sub_category
                ON product.sub_category_id = sub_category.id";
$product = $conn->query($products_sql);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../bootstrap/dash/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../bootstrap/dash/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../bootstrap/dash/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../bootstrap/dash/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../bootstrap/dash/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../bootstrap/dash/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../bootstrap/dash/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../bootstrap/dash/assets/images/favicon.png" />
  </head>
  <body>
  <?php include "includes/dashboard_header.php";?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Products</h4>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Sub Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Created Date</th>
                            <th>Image</th>
                            <!-- <th>QR Code</th>  -->
                            <th>Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($product->num_rows>0){
                                while($row = $product->fetch_assoc()){
                                    echo '<tr>';
                                    echo '<td>' . $row['product_id'] . '</td>';
                                    echo '<td>' . $row['sub_category'] . '</td>';
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['price'] . '</td>';
                                    echo '<td>' . $row['quantity'] . '</td>';
                                    echo '<td>' . $row['created_date'] . '</td>';
                                    echo '<td><img src="' . $row['image'] . '" alt="Product Image"></td>';
                                    // echo '<td><img src="' . $row['qr_code'] . '" alt="Product Image"></td>';
                                    echo '<td>
                                          <a href="functions/view.php?id=' . $row['product_id'] . '&page=' . "product" . '" class="btn btn-secondary">View</a>
                                          <a href="functions/delete.php?id=' . $row['product_id'] . '&page=' . "product" . '" class="btn btn-danger">Delete</a>
                                        </td>';
                                   echo '</tr>';
                                }
                            }else{
                                echo '<td colspan=9>No Products!</td>';
                            }
                        ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Brilliance 2024</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../bootstrap/dash/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../bootstrap/dash/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../bootstrap/dash/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../bootstrap/dash/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../bootstrap/dash/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../bootstrap/dash/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../bootstrap/dash/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../bootstrap/dash/assets/js/off-canvas.js"></script>
    <script src="../bootstrap/dash/assets/js/hoverable-collapse.js"></script>
    <script src="../bootstrap/dash/assets/js/misc.js"></script>
    <script src="../bootstrap/dash/assets/js/settings.js"></script>
    <script src="../bootstrap/dash/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../bootstrap/dash/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>


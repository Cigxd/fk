<?php
include '../database/config.php';
////////////////////////////////////session start
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
  // Redirect to login page or other appropriate page
  header("Location: ../login.php");
  exit();
}
////////////////////////////////////end session

////////////////////////////////////get username start
$sql = "SELECT * FROM admin WHERE id = 1";
$admin = $conn->query($sql);
$row = $admin->fetch_assoc();
$username = $row['username'];
$password = $row['password'];
////////////////////////////////////get username end
            
////////////////////////////////////edit username and password start
if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['edit'])){
    $new_username = $_POST['user'];
    $new_password = $_POST['pass'];
    $query = "UPDATE `admin` SET username='$new_username'";
    mysqli_query($conn,$query);
    $query = "UPDATE `admin` SET password='$new_password'";
    mysqli_query($conn,$query);
    header("Location:setting.php");
}
if(isset($_POST['cancel'])){
    header("Location:dashboard.php");
}
////////////////////////////////////end edit username and password 
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form action="setting.php" method="POST">
                        <div class="form-group" id="fossilPeriodField">
                            <label for="exampleInputFossilPeriod">username</label>
                            <input type="text" name="user" class="form-control" id="exampleInputFossilPeriod" value="<?php echo "$username";?>"> 
                        </div>
                        <div class="form-group" id="fossilPeriodField">
                            <label for="exampleInputFossilPeriod">password</label>
                            <input type="password" name="pass" class="form-control" id="exampleInputFossilPeriod" value="<?php echo "$password";?>">
                        </div>
                            <button type="submit" class="btn btn-success me-2" name="edit">Edit</button>
                            <button class="btn btn-danger" name="cancel">Cancel</button>
                    </form>
                </div>
            </div>
          </div>
            <?php include 'includes/dashboard_footer.php';?>
        </div>
      <!-- page-body-wrapper ends -->
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


<?php
include '../../database/config.php';
include "../../includes/phpqrcode/qrlib.php";

 // include '../../database/sessions/admin_session.php';
 $sql = "SELECT username FROM admin WHERE id = 1";
 $admin = $conn->query($sql);
 $row = $admin->fetch_assoc();
///inserting
$fossil_query = "SELECT * FROM sub_category WHERE category_id=1";
$mineral_query = "SELECT * FROM sub_category WHERE category_id=2";
$meteorite_query = "SELECT * FROM sub_category WHERE category_id=3";
$jewelry_query = "SELECT * FROM sub_category WHERE category_id=4";

$fossil_sql = mysqli_query($conn,$fossil_query);
$mineral_sql = mysqli_query($conn,$mineral_query);
$meteorite_sql = mysqli_query($conn,$meteorite_query);
$jewelry_sql = mysqli_query($conn,$jewelry_query);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form values
    $category = $_POST["select"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

   //////////image
        $image_title = $_FILES["img"]['name'];
        $image_type = $_FILES["img"]['type'];
        $image_tmp = $_FILES["img"]['tmp_name'];

        $target = "../../uploads/products/";
        
        $image_dir = $target . $image_title;
        move_uploaded_file($image_tmp,$image_dir);

      

  //////////qr code 
    $query = "SELECT (product_id+1) AS max from product";
    $sql = mysqli_query($conn,$query);
    $new_id = mysqli_fetch_assoc($sql);

    // how to save PNG codes to server
    
    $tempDir = "../../uploads/products/";
    
    $codeContents = "localhost/fk/client/view_products.php?id='{$new_id['max']}'";
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.md5($codeContents).'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
    }

  
    // Depending on the category, you can retrieve additional fields
    if ($category == "fossil") {
        $fossilPeriod = $_POST["period"];
        $rockType = NULL;
        $mineralEnvironment = NULL;
        $sub_category = $_POST['Sub_select_fossil'];
        $insert_query = "INSERT INTO product (sub_category_id,`name`,`fossile_period`,`price`,`quantity`,`image`,`qr_code`,`description`)
        VALUES($sub_category,'{$_POST['name']}', '{$_POST['period']}','{$_POST['price']}','{$_POST['quantity']}','{$image_dir}','{$fileName}','{$_POST['description']}')";
        // Process fossil data
    } elseif ($category == "mineral") {
        $mineralEnvironment = $_POST["mineralEnvironment"];
        $fossilPeriod = NULL;
        $rockType = NULL;
        $sub_category = $_POST['Sub_select_mineral'];
        $insert_query = "INSERT INTO product (sub_category_id,`name`,mineral_envirement,price,quantity,`image`,qr_code,`description`)
        VALUES('$sub_category','{$_POST['name']}', '{$_POST['env']}','{$_POST['price']}','{$_POST['quantity']}','{$image_dir}','{$fileName}','{$_POST['description']}')";
        // Process mineral data
    } elseif ($category == "jewelry") {
        $rockType = $_POST["type"];
        $fossilPeriod = NULL;
        $mineralEnvironment = NULL;
        $sub_category = $_POST['Sub_select_jewelry'];
        $insert_query = "INSERT INTO product (sub_category_id,`name`,rock_type,price,quantity,`image`,qr_code,`description`)
        VALUES('$sub_category','{$_POST['name']}', '{$_POST['type']}','{$_POST['price']}','{$_POST['quantity']}','{$image_dir}','{$fileName}','{$_POST['description']}')";
        // Process jewelry data
    }else if($category == "meteorite"){
        $rockType = NULL;
        $fossilPeriod = NULL;
        $mineralEnvironment = NULL;
        $sub_category = $_POST['Sub_select_meteorite'];
        $insert_query = "INSERT INTO product (sub_category_id,`name`,price,quantity,`image`,qr_code,`description`)
        VALUES('$sub_category','{$_POST['name']}','{$_POST['price']}','{$_POST['quantity']}','{$image_dir}','{$fileName}','{$_POST['description']}')";////////////////////////////////////////////////////////NOT DONE YET!!!!!!!!!!!!
    }
    // Execute SQL query
    // $result = mysqli_query($conn, $sql);
   
    // Check if image file is a actual image or fake image
    ///yes
    
    if(isset($_POST['add_prod'])){
    $sql=mysqli_query($conn,$insert_query);
    }else{
      echo 'error';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../bootstrap/dash/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../bootstrap/dash/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../bootstrap/dash/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../bootstrap/dash/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../bootstrap/dash/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../bootstrap/dash/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../bootstrap/dash/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../bootstrap/dash/assets/images/favicon.png" />
  </head>
  <body>
<div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand" style="color: while; text-decoration:none;" href="../../index.php">
            <h1>Brilliance</h1>
        </a>
          <a class="sidebar-brand brand-logo-mini" href="../../../index.html"><img src="../bootstrap/dash/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">

          <li class="nav-item menu-items active">
            <a class="nav-link" href="../dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-areaspline"></i>
              </span>
              <span class="menu-title">Analytics</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="../products.php">
              <span class="menu-icon">
                <i class="mdi mdi-equal-box"></i>
              </span>
              <span class="menu-title">Products</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="../clients.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-card-details"></i>
              </span>
              <span class="menu-title">Clients</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="../orders.php">
              <span class="menu-icon">
                <i class="mdi mdi-basket-fill"></i>
              </span>
              <span class="menu-title">Orders</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../../index.html"><img src="../bootstrap/dash/assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>

            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" href="#">
                    + Add New Product
                </a>
              </li>

              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="../functions/message.php"  aria-expanded="false">
                  <i class="mdi mdi-email"></i>

                  <?php
                  $query = "SELECT * FROM contact WHERE seen='0'";
                  $sql = mysqli_query($conn,$query);
                  if(mysqli_num_rows($sql)>0){
                    
                  echo'<span class="count bg-success"></span>';
                  }else{
                    echo'<span class="count "></span>';
                  }
                  ?>

                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Contacts</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../bootstrap/dash/assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>

                  <?php
                  $query_order = "SELECT * FROM `order` WHERE seen='0'";
                  $sql_order = mysqli_query($conn,$query_order);
                  if(mysqli_num_rows($sql)>0){
                  echo'<span class="count bg-danger"></span>';
                  }else{
                    echo'<span class="count bg-false"></span>';
                  }
                  ?>
                  <?php 
                      $query_order = "SELECT `order`.*,client.company_name AS 'client' FROM `order` left join client
                      ON `order`.client_id = client.client_id
                       WHERE seen='0'";

                      $sql_order = $conn->query($query_order);
                      ?>
                  
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  
                  <?php 
                    if(mysqli_num_rows($sql_order)>0){
                     while($row_order = $sql_order -> fetch_assoc()){
                    echo '<a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                          <p class="preview-subject mb-1">New order</p>
                          <p class="text-muted ellipsis mb-0">From '.$row_order['client'].'</p>
                          </div>
                          </a>';
                     }
                }else{
                  echo '<a class="dropdown-item preview-item">
                <div class="preview-item-content">
                <p>No notifications at this moment</p>
                      </div>
                      </a>';
                } ?>
                  
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                  <div class="navbar-profile">
                        <i class="mdi mdi-account-circle"></i>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                        <?php echo $row['username']; ?>
                    </p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="../../logout.php" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>

                    <form class="forms-sample" method="POST" action="add_product.php" enctype="multipart/form-data">

                    <div class="form-group">
    <label for="exampleSelectGender">Category</label>
    <select class="form-control" id="exampleSelectGender" name="select" onchange="toggleFields()">
        <option value="fossil">Fossil</option>
        <option value="mineral">Mineral</option>
        <option value="meteorite">Meteorite</option>
        <option value="jewelry">Jewelry</option>
    </select>
</div>          
<div class="form-group" id="sub_select_fossil">
    <label for="sub_select_fossil">Sub Category</label>
    <select class="form-control" id="sub_select_fossil" name="Sub_select_fossil" onchange="toggleFields()">
      <?php
       if(mysqli_num_rows($fossil_sql) > 0){
          while($row = mysqli_fetch_assoc($fossil_sql)){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
      }
      ?>
    </select>
</div>
<div class="form-group" id="sub_select_mineral">
    <label for="sub_select_mineral">Sub Category</label>
    <select class="form-control" id="sub_select_mineral" name="Sub_select_mineral" onchange="toggleFields()">
      <?php
       if(mysqli_num_rows($mineral_sql) > 0){
          while($row = mysqli_fetch_assoc($mineral_sql)){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
      }
      ?>
    </select>
</div>
<div class="form-group" id="sub_select_meteorite">
    <label for="sub_select_meteorite">Sub Category</label>
    <select class="form-control" id="sub_select_meteorite" name="Sub_select_meteorite" onchange="toggleFields()">
      <?php
       if(mysqli_num_rows($meteorite_sql) > 0){
          while($row = mysqli_fetch_assoc($meteorite_sql)){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
      }
      ?>
    </select>
</div>
<div class="form-group" id="sub_select_jewelry">
    <label for="sub_select_jewelry">Sub Category</label>
    <select class="form-control" id="sub_select_jewelry" name="Sub_select_jewelry" onchange="toggleFields()">
      <?php
       if(mysqli_num_rows($jewelry_sql) > 0){
          while($row = mysqli_fetch_assoc($jewelry_sql)){
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
          }
      }
      ?>
    </select>
</div>


<div class="form-group" id="fossilPeriodField">
    <label for="exampleInputFossilPeriod">Fossil Period (only for fossils!)</label>
    <input type="text" class="form-control" id="exampleInputFossilPeriod" placeholder="Fossil Period" name="period">
</div>

<div class="form-group" id="mineralenvironnement" style="display: none;">
    <label for="exampleInputMineralEnvironment">Mineral Environment (only for minerals!)</label>
    <input type="text" class="form-control" id="exampleInputMineralEnvironment" placeholder="Mineral Environment" name="env">
</div>

<div class="form-group" id="rockTypeField" style="display: none;">
    <label for="exampleInputRockType">Rock Type (only for minerals!)</label>
    <input type="text" class="form-control" id="exampleInputRockType" placeholder="Rock Type" name="type">
</div>

<div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
</div>

<div class="form-group">
    <label for="exampleInputPrice">Price Per Piece</label>
    <input type="text" class="form-control" id="exampleInputPrice" placeholder="Price" name="price">
</div>
<div class="form-group">
    <label for="exampleInputQuantity">Quantity</label>
    <input type="text" class="form-control" id="exampleInputQuantity" placeholder="Quantity" name="quantity">
</div>

<script>
    // JavaScript function to toggle fields based on selected category
    function toggleFields() {
        var category = document.getElementById("exampleSelectGender").value;
        if (category === "fossil") {
            document.getElementById("fossilPeriodField").style.display = "block";
            document.getElementById("mineralenvironnement").style.display = "none";
            document.getElementById("rockTypeField").style.display = "none";
            document.getElementById("sub_select_fossil").style.display = "block";
            document.getElementById("sub_select_mineral").style.display = "none";
            document.getElementById("sub_select_meteorite").style.display = "none";
            document.getElementById("sub_select_jewelry").style.display = "none";
        } else if (category === "mineral") {
            document.getElementById("fossilPeriodField").style.display = "none";
            document.getElementById("mineralenvironnement").style.display = "block";
            document.getElementById("rockTypeField").style.display = "none";
            document.getElementById("sub_select_mineral").style.display = "block";
            document.getElementById("sub_select_fossil").style.display = "none";
            document.getElementById("sub_select_meteorite").style.display = "none";
            document.getElementById("sub_select_jewelry").style.display = "none";
        } else if (category === "jewelry") {
            document.getElementById("fossilPeriodField").style.display = "none";
            document.getElementById("mineralenvironnement").style.display = "none";
            document.getElementById("rockTypeField").style.display = "block";
            document.getElementById("sub_select_jewelry").style.display = "block";
            document.getElementById("sub_select_mineral").style.display = "none";
            document.getElementById("sub_select_fossil").style.display = "none";
            document.getElementById("sub_select_meteorite").style.display = "none";
        } else if (category === "meteorite") {
            document.getElementById("fossilPeriodField").style.display = "none";
            document.getElementById("mineralenvironnement").style.display = "none";
            document.getElementById("rockTypeField").style.display = "none";
            document.getElementById("sub_select_jewelry").style.display = "none";
            document.getElementById("sub_select_mineral").style.display = "none";
            document.getElementById("sub_select_meteorite").style.display = "block";
            document.getElementById("sub_select_fossil").style.display = "none";
        }
    }

    // Call toggleFields() when the page loads to set the initial state
    toggleFields();
</script>




                      



            
                      <div class="form-group">
                        <label>Image upload</label>
                        <input type="file" class="file-upload-default btn btn-primary">
                        <div class="input-group col-xs-12">
                          <input type="FILE" class="form-control file-upload-info " placeholder="Upload Image" name="img" >
                          <span class="input-group-append">
                          </span>
                        </div>
                      </div>





                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="description"></textarea>
                      </div>




                      <button type="submit" class="btn btn-success me-2" name="add_prod">Add Product</button>
                      
                     <button class="btn btn-danger" >Cancel</button>
                     

                    </form>
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
    <script src="../../bootstrap/dash/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../bootstrap/dash/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../../bootstrap/dash/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../bootstrap/dash/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../bootstrap/dash/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../bootstrap/dash/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../../bootstrap/dash/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../bootstrap/dash/assets/js/off-canvas.js"></script>
    <script src="../../bootstrap/dash/assets/js/hoverable-collapse.js"></script>
    <script src="../../bootstrap/dash/assets/js/misc.js"></script>
    <script src="../../bootstrap/dash/assets/js/settings.js"></script>
    <script src="../../bootstrap/dash/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../bootstrap/dash/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>


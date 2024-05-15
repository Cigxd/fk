<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
<div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand" style="color: while; text-decoration:none;" href="../index.php">
            <h1>Brilliance</h1>
        </a>
          <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="../bootstrap/dash/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">

          <li class="nav-item menu-items active">
            <a class="nav-link" href="dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-areaspline"></i>
              </span>
              <span class="menu-title">Analytics</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="products.php">
              <span class="menu-icon">
                <i class="mdi mdi-equal-box"></i>
              </span>
              <span class="menu-title">Products</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="clients.php">
              <span class="menu-icon">
                <i class="mdi mdi-account-card-details"></i>
              </span>
              <span class="menu-title">Clients</span>
            </a>
          </li>


          <li class="nav-item menu-items">
            <a class="nav-link" href="orders.php">
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
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../bootstrap/dash/assets/images/logo-mini.svg" alt="logo" /></a>
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
                <a class="nav-link btn btn-success create-new-button" href="functions/add_product.php">
                    + Add New Product
                </a>
              </li>

              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="functions/message.php"  aria-expanded="false">
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
                  <a href="../logout.php" class="dropdown-item preview-item">
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
</body>
</html>
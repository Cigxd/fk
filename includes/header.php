<?php
include 'database/config.php';
$fossil_query = "SELECT * FROM sub_category WHERE category_id = 1";
$mineral_query = "SELECT * FROM sub_category WHERE category_id = 2";
$meteorite_query = "SELECT * FROM sub_category WHERE category_id = 3";
$jewelry_query = "SELECT * FROM sub_category WHERE category_id = 4";
$fossile_sql = mysqli_query($conn,$fossil_query);
$mineral_sql = mysqli_query($conn,$mineral_query);
$meteorite_sql = mysqli_query($conn,$meteorite_query);
$jewelry_sql = mysqli_query($conn,$jewelry_query);


if($page == "admin"){
    echo '
<header id="header" class="header fixed-top">

<div class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center">
        <a href="mailto:brilliancemuseum@gmail.com">brilliancemuseum@gmail.com</a>
    </i>
      <i class="bi bi-phone d-flex align-items-center ms-4">
        <span>
            +1 5589 55488 55
        </span></i>
    </div>


    <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</div><!-- End Top Bar -->

<div class="branding d-flex align-items-center">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="#" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">Brilliance</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="">Home</a></li>
        <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li class="dropdown"><a href="#"><span>Fossils</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($fossile_sql) > 0){
                while($row = mysqli_fetch_assoc($fossile_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
            <li class="dropdown"><a href="#"><span>Minerals</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($mineral_sql) > 0){
                while($row = mysqli_fetch_assoc($mineral_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
            <li class="dropdown"><a href="#"><span>Meteorites</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($meteorite_sql) > 0){
                while($row = mysqli_fetch_assoc($meteorite_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
            <li class="dropdown"><a href="#"><span>Jewelry</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($jewelry_sql) > 0){
                while($row = mysqli_fetch_assoc($jewelry_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
          </ul>
        </li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>

</div>

</header>';

}elseif($page == "client"){
    echo '
<header id="header" class="header fixed-top">

<div class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center">
        <a href="mailto:brilliancemuseum@gmail.com">brilliancemuseum@gmail.com</a>
    </i>
      <i class="bi bi-phone d-flex align-items-center ms-4">
        <span>
            +1 5589 55488 55
        </span></i>
    </div>


    <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</div><!-- End Top Bar -->

<div class="branding d-flex align-items-center">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="#" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">Brilliance</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="">Home</a></li>
        <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
          <li class="dropdown"><a href="#"><span>Fossils</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>';
          if(mysqli_num_rows($fossile_sql) > 0){
            while($row = mysqli_fetch_assoc($fossile_sql)){
              echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
            }

          }
          echo '</ul>
        </li>
        <li class="dropdown"><a href="#"><span>Minerals</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>';
          if(mysqli_num_rows($mineral_sql) > 0){
            while($row = mysqli_fetch_assoc($mineral_sql)){
              echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
            }

          }
          echo '</ul>
        </li>
        <li class="dropdown"><a href="#"><span>Meteorites</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>';
          if(mysqli_num_rows($meteorite_sql) > 0){
            while($row = mysqli_fetch_assoc($meteorite_sql)){
              echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
            }

          }
          echo '</ul>
        </li>
        <li class="dropdown"><a href="#"><span>Jewelry</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>';
          if(mysqli_num_rows($jewelry_sql) > 0){
            while($row = mysqli_fetch_assoc($_sql)){
              echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
            }

          }
          echo '</ul>
        </li>
          </ul>
        </li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>

</div>

</header>';

}elseif($page == "login"){

  echo '
  <header id="header" class="header fixed-top">

<div class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center">
        <a href="mailto:brilliancemuseum@gmail.com">brilliancemuseum@gmail.com</a>
    </i>
      <i class="bi bi-phone d-flex align-items-center ms-4">
        <span>
            +1 5589 55488 55
        </span></i>
    </div>


    <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</div><!-- End Top Bar -->


</header>';

}else{
    echo '
<header id="header" class="header fixed-top">

<div class="topbar d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center">
        <a href="mailto:brilliancemuseum@gmail.com">brilliancemuseum@gmail.com</a>
    </i>
      <i class="bi bi-phone d-flex align-items-center ms-4">
        <span>
            +212 5 77 83 08 36
        </span></i>
    </div>


    <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>
  </div>
</div><!-- End Top Bar -->

<div class="branding d-flex align-items-center">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="#" class="logo d-flex align-items-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">Brilliance</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="">Home</a></li>
        <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li class="dropdown"><a href="#"><span>Fossils</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
                
                if(mysqli_num_rows($fossile_sql) > 0){
                  while($row = mysqli_fetch_assoc($fossile_sql)){
                    echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                  }

                }
              echo '</ul>
            </li>
            <li class="dropdown"><a href="#"><span>Minerals</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($mineral_sql) > 0){
                while($row = mysqli_fetch_assoc($mineral_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
            <li class="dropdown"><a href="#"><span>Meteorites</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($meteorite_sql) > 0){
                while($row = mysqli_fetch_assoc($meteorite_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
            <li class="dropdown"><a href="#"><span>Jewelry</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>';
              if(mysqli_num_rows($jewelry_sql) > 0){
                while($row = mysqli_fetch_assoc($jewelry_sql)){
                  echo '<li><a href="client/products.php?id='.$row['id'].'">'.$row['name']. '</a></li>';
                }

              }
              echo '</ul>
            </li>
          </ul>
        </li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="/fk/login.php">Login</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>

</div>

</header>';

}



?>
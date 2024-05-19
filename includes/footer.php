<?php
include '../database/config.php';

$sql = "SELECT * FROM `category`";
$category = mysqli_query($conn, $sql);

?>

<footer id="footer" class="footer position-relative">

<div class="container footer-top">
  <div class="row gy-4">
    <div class="col-lg-4 col-md-6">
      <div class="footer-about">
        <a href="index.html" class="logo sitename">Brilliance</a>
        <div class="footer-contact pt-3">
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p class="mt-3"><strong>Phone:</strong> <span>+212 5 77 83 08 36</span></p>
          <p><strong>Email:</strong> <span>brilliancemuseum@gmail.com</span></p>
        </div>
        <div class="social-links d-flex mt-4">
          <a href=""><i class="bi bi-twitter"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php#about">About us</a></li>
        <li><a href="terms.html">Terms of service</a></li>
        <li><a href="policy.html">Privacy policy</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-md-3 footer-links">
      <?php
      if(mysqli_num_rows($category) > 0){
        echo '<h4>Categories</h4>';
        echo '<ul>';
        while($row = mysqli_fetch_assoc($category)){
            echo '<li><a href="client/products.php?cat_id=' . $row['id'] . '">' . $row['name'] . '</a></li>';
        }
        echo '</ul>';
      }else{
        echo '<h4>No Category Found!</h4>';
      }
      ?>
    </div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">Brilliance</strong> <span>All Rights Reserved 2024</span></p>
</div>

</footer>

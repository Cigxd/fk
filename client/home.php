<?php
$page = 'client';
require '../database/config.php';
include 'functions/contact.php';
include 'functions/list_products.php';
require_once 'path/to/checkUserSession.php';
checkUserSession();

$products = list_products_by_time($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Home Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://static.wikia.nocookie.net/gtawiki/images/6/6b/Ryder-GTASAde.png/revision/latest?cb=20211113214809" rel="icon">
  <link href="../bootstrap/Day/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../bootstrap/Day/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../bootstrap/Day/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../bootstrap/Day/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../bootstrap/Day/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../bootstrap/Day/assets/css/main.css" rel="stylesheet">
  <style>
   .shit{
      background: rgba(255, 255, 255, 0.17);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(6.2px);
      -webkit-backdrop-filter: blur(6.2px);
      border: 1px solid rgba(255, 255, 255, 0.16);
   }
   

  </style>

</head>
<body class="index-page">




<?php include '../includes/header.php'; ?>



<main class="main bg-black">
   <!-- Hero Section -->
  
   <section class="hero-section mt-5 bg-black">
   <div class="container py-5">
        <div class="row mb-4 align-items-center flex-lg-row-reverse">
            <div class="col-md-6 col-xl-7 mb-4 mb-lg-0 " >
                <!-- requires glightbox, please flag the option in the picostrap customizer panel-->


                <div class="lc-block position-relative"><img class="img-fluid rounded shadow" src="https://images.unsplash.com/photo-1621947081720-86970823b77a?ixlib=rb-1.2.1&amp" srcset="https://c4.wallpaperflare.com/wallpaper/733/496/988/procedural-minerals-mineral-colorful-abstract-wallpaper-preview.jpg" sizes="(max-width: 3840px) 100vw, 3840px" width="3840" height="" alt="Photo by Richard Horvath">
                    <a class="position-absolute top-50 start-50 translate-middle glightbox d-flex justify-content-center align-items-center" href="https://www.youtube.com/watch?v=BKgpLOUYZJ4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="5em" height="5em" fill="currentColor" class="text-white" viewBox="0 0 16 16" lc-helper="svg-icon">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"></path>
                        </svg>
                    </a>
                </div>
            </div><!-- /col -->
            <div class="col-md-6 col-xl-5">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h1 class="fw-bolder display-2 text-light">Discover Brilliance</h1>
                    </div>
                </div><!-- /lc-block -->
                <!-- /lc-block -->


               <div class="lc-block mb-4">
                    <div editable="rich">

                        <p class="lead text-light">
                        Welcome to Brilliance where the earth's marvels meet human ingenuity. Delve into our exquisite assortment of precious rocks, each a testament to the magnificence of geological artistry. From the fiery brilliance of rubies to the serene allure of sapphires, our collection transcends time, offering a glimpse into the depths of nature's wonder.
                        </p>

                    </div>
               </div>
               <div class="lc-block">
                  <a class="btn btn-lg text-light btn-hover" style="background-color: none; border: 1px solid white;" href="#latest" role="button">Explore Our Collection</a>
               </div><!-- /lc-block -->
            </div><!-- /col -->
        </div>
    </div>



    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script defer src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js" onload="const lightbox = GLightbox({});"></script>
    <!-- lazily load the gLightbox CSS file -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

   </section>

   <!-- /Hero Section -->
   <!-- Hero Section -->
<section class="hero-section mt-5 bg-black">
    <div class="container">
        <div class="row" id="latest">
            <div class="col-12 text-center mb-5">
                <h1 class="text-justify mt-4 text-light">LATEST PRODUCTS</h1>
            </div>
        </div>
        <?php
if ($products->num_rows > 0) {
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">';
    while ($row = $products->fetch_assoc()) {
        $product_id = $row['product_id'];
        $sub_category_id = $row['sub_category_id'];
        $name = $row['name'];
        $mineral_envirement = $row['mineral_envirement'];
        $fossile_period = $row['fossile_period'];
        $rock_type = $row['rock_type'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $created_date = $row['created_date'];
        $image = $row['image'];
        $qr_code = $row['qr_code'];
        $description = $row['description'];

        if (strlen($description) > 60){
            $str = substr($description, 0, 59) . '...';
         }else{
            $str = $description;
         }
         
                       
        if (strpos($image, '../../') === 0) {
          $image = str_replace('../../', '../', $image);
        }
        $qr_code = str_replace('005', '../uploads/products/005', $qr_code);

        if($quantity>0){
         $qte = "Available in Stock";
         $cls = "success";
        }else{
         $qte = "Not Available in Stock";
         $cls = "danger";
        }


        (strlen($str) < 31)?$add = '<br>':$add = '';
        echo '<div class="col">
                 <div class="card h-100 p-2 rounded bg-black">
                    <img src="' . $image . '" class="card-img-top" alt="Product Image" style="max-height: 200px;">
                    <div class="card-body">
                          <h5 class="card-title text-light">' . $name . '</h5>
                          <h6 class="text-'.$cls.'">'.$qte.'</h6>
                          <p class="card-text text-light">' .$add  . $str . '</p>
                          <div class="d-flex flex-column mt-4">
                             <button type="button" class="btn text-light" style="background-color: #cc1616;" data-toggle="modal" data-target="#productModal' . $product_id . '">Details</button>
                             <button class="btn btn-outline-secondary btn-sm mt-2 add-to-cart-btn" data-product-id="' . $product_id . '">
                                 Add to cart
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                 </svg>
                             </button>
                          </div>
                       </div>
                    </div>
                 </div>

                 <!-- Modal -->
                 <div class="modal fade bd-example-modal-lg" id="productModal' . $product_id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel' . $product_id . '" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel' . $product_id . '">Product Details</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body shit">
                         <div class="row">
                         <div class="col-md-6">
                             <img src="' . $image .'" class="img-fluid" alt="Product Image">
                         </div>
                         <div class="col-md-6">
                             <h4>' . $name . '</h4>
                             <p><strong>Mineral Environment: </strong>' . $mineral_envirement . '</p>
                             <p><strong>Fossil Period: </strong>' . $fossile_period . '</p>
                             <p><strong>Rock Type: </strong>' . $rock_type . '</p>
                             <p><strong>Price: </strong>$ ' . $price . '</p>
                             <p><strong>Quantity: </strong>' . $quantity . '</p>
                             <p><strong>Published at: </strong>' . $created_date . '</p>
                             <p><strong>Description: </strong>' . $description . '</p>
                         </div>
                         <div class="col-md-6">
                             <p><strong>QR Code: </strong> <br><br> <span class="p-4"><img src="' . $qr_code . '" width="100px"></span></p>
                         </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="button" class="btn text-light" style="background-color: #cc1616;">Add to Cart</button>
                     </div>
                     </div>
                 </div>
                 </div>';
    }
    echo '</div>';
} else {
    echo 'No products found.';
}
?>


    </div>
</section>


   <!-- About Section -->
   <section id="about" class="about section bg-black">
      <!-- Section Title -->
      <div class="container section-title" >
         <span class="">About Us<br></span>
         <h2 class="text-light">About Us<br></h2>
         <p class="text-light">We take pride in being more than just a marketplace for rare and exquisite treasures. We are curators of stories, custodians of history, and purveyors of beauty. Our mission is to unlock the mysteries of the Earth and share its wonders with the world.</p>
      </div>
      <!-- End Section Title -->
      <div class="container text-light">
         <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2"  data-aos-delay="100">
               <img src="../resources/jossuha-theophile-ZhVKeFCb6NE-unsplash.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content"  data-aos-delay="200">
               <h3 class="text-light">Embark on a voyage of exploration with Brilliance as your guide.</h3>
               <p class="fst-italic">
                  Our user-friendly online platform makes it easy to browse, shop, and discover new treasures from the comfort of your own home. Whether you're seeking a rare addition to your collection or the perfect gift for a loved one, our dedicated team is here to assist you every step of the way.
               </p>
               <ul>
                  <li><i class="bi bi-check-circle"></i> <span>Incredible collections.</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Support 24/7.</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>World wide shipping.</span></li>
               </ul>
               <a href="#contact" class="read-more"><span>Contact Us</span><i class="bi bi-arrow-right"></i></a>
            </div>
         </div>
      </div>
   </section>
   <!-- /About Section -->
   <!-- Clients Section -->
   <section id="clients" class="clients section bg-black">
      <!-- Section Title -->
      <div class="container section-title" >
         <span class="">Our Partners & Clients</span>
         <h2 class="text-light">Our Partners & Clients</h2>
         <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      <!-- End Section Title -->
      <div class="container">
         <div class="swiper">
            <script type="application/json" class="swiper-config">
               {
                 "loop": true,
                 "speed": 600,
                 "autoplay": {
                   "delay": 1000
                 },
                 "slidesPerView": "auto",
                 "pagination": {
                   "el": ".swiper-pagination",
                   "type": "bullets",
                   "clickable": true
                 },
                 "breakpoints": {
                   "320": {
                     "slidesPerView": 2,
                     "spaceBetween": 40
                   },
                   "480": {
                     "slidesPerView": 3,
                     "spaceBetween": 60
                   },
                   "640": {
                     "slidesPerView": 4,
                     "spaceBetween": 80
                   },
                   "992": {
                     "slidesPerView": 6,
                     "spaceBetween": 120
                   }
                 }
               }
            </script>
            <div class="swiper-wrapper align-items-center">
               <div class="swiper-slide"><img src="../resources/58428e7da6515b1e0ad75ab5.png" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/cma-cgm-logo.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/maersk-group-logo.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/Mastercard-logo.svg.png" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/paypal-3.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/visa-checkout-1.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/ocean-network-express-logo.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="../resources/dhl-1.svg" class="img-fluid" alt=""></div>
            </div>
         </div>
      </div>
   </section>

   </div>
   </div>
   </section><!-- /Services Section -->
   <!-- Contact Section -->
   <section id="contact" class="contact section bg-black">
      <!-- Section Title -->
      <div class="container section-title" >
         <span class="">Contact</span>
         <h2 class="text-light">Contact</h2>
         <p class="text-light">Check our conbtact info</p>
      </div>
      <!-- End Section Title -->
      <div class="container"  data-aos-delay="100">
         <div class="row gy-4">
            <div class="col-lg-6">
               <div class="info-item d-flex flex-column justify-content-center align-items-center text-light"  data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3 class="text-light">Address</h3>
                  <p class="text-light">Taounate 34000</p>
               </div>
            </div>
            <!-- End Info Item -->
            <div class="col-lg-3 col-md-6">
               <div class="info-item d-flex flex-column justify-content-center align-items-center"  data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3 class="text-light">Call Us</h3>
                  <p class="text-light">+212 5 77 83 08 36</p>
               </div>
            </div>
            <!-- End Info Item -->
            <div class="col-lg-3 col-md-6">
               <div class="info-item d-flex flex-column justify-content-center align-items-center"  data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3 class="text-light">Email Us</h3>
                  <p class="text-light">brilliancemuseum@gmail.com</p>
               </div>
            </div>
            <!-- End Info Item -->
         </div>
         <div class="row gy-4 mt-1">
            <div class="col-lg-6">
               <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d206.81247175783622!2d-4.637150723645987!3d34.535918845053715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sma!4v1716110982892!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- End Google Maps -->
            <div class="col-lg-6">
               <form action="home.php" method="POST">
                  <div class="form-group">
                        <label class="text-light" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                        <label class="text-light" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="form-group">
                        <label class="text-light" for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                  </div>
                  <div class="form-group">
                        <label class="text-light" for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-danger mt-4" >Send</button>
               </form>
            </div>

            <?php
            // Process form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
               $result = processContactForm($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
               if ($result === true) {
                  echo '<p class="text-success">Message sent successfully!</p>';
               } else {
                  echo '<p class="text-danger">Failed to send message. Please try again later.</p>';
               }
            }
            ?>
            <!-- End Contact Form -->
         </div>
      </div>
   </section>
   <!-- /Contact Section -->
</main>
<?php
   include '../includes/footer.php';
?>

<!-- Scroll Top -->

<!-- Vendor JS Files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!-- Vendor JS Files -->
   <script src="../bootstrap/Day/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../bootstrap/Day/assets/vendor/php-email-form/validate.js"></script>
   <script src="../bootstrap/Day/assets/vendor/aos/aos.js"></script>
   <script src="../bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="../bootstrap/Day/assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="../bootstrap/Day/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
   <script src="../bootstrap/Day/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <!-- Main JS File -->
   <script src="../bootstrap/Day/assets/js/main.js"></script>

</body>
</html>
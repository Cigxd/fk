<?php
include 'client/functions/contact.php';
require 'database/config.php';


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
  <link href="bootstrap/Day/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="bootstrap/Day/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/Day/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="bootstrap/Day/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="bootstrap/Day/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="bootstrap/Day/assets/css/main.css" rel="stylesheet">

</head>
<body class="index-page">



<header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center">
                    <a href="mailto:brilliancemuseum@gmail.com">brilliancemuseum@gmail.com</a>
                </i>
                <i class="bi bi-phone d-flex align-items-center ms-4">
                    <span>+1 5589 55488 55</span>
                </i>
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
            <a href="<?php echo $home ?>" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Brilliance</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="client/action/login.php">Login/Register</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>




<main class="main">
   <!-- Hero Section -->
   <section id="hero" class="hero section">
      <img src="resources/thumb-1920-632955.jpg" alt="" data-aos="fade-in">
      <div class="container"  data-aos-delay="100">
         <div class="row justify-content-start">
            <div class="col-lg-8">
               <h2 class="">Welcome to Brilliance</h2>
               <p>Welcome to Brillance - Where Every Stone Holds a Story</p>
               <a href="client/action/login.php" class="btn-get-started">Login/Register</a>
            </div>
         </div>
      </div>
   </section>
   <!-- /Hero Section -->
   <!-- About Section -->
   <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" >
         <span class="">About Us<br></span>
         <h2 class="">About Us<br></h2>
         <p>We take pride in being more than just a marketplace for rare and exquisite treasures. We are curators of stories, custodians of history, and purveyors of beauty. Our mission is to unlock the mysteries of the Earth and share its wonders with the world.</p>
      </div>
      <!-- End Section Title -->
      <div class="container">
         <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2"  data-aos-delay="100">
               <img src="resources/jossuha-theophile-ZhVKeFCb6NE-unsplash.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content"  data-aos-delay="200">
               <h3>Embark on a voyage of exploration with Brilliance as your guide.</h3>
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
   <section id="clients" class="clients section">
      <!-- Section Title -->
      <div class="container section-title" >
         <span class="">Our Partners & Clients</span>
         <h2>Our Partners & Clients</h2>
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
               <div class="swiper-slide"><img src="resources/58428e7da6515b1e0ad75ab5.png" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/cma-cgm-logo.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/maersk-group-logo.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/Mastercard-logo.svg.png" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/paypal-3.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/visa-checkout-1.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/ocean-network-express-logo.svg" class="img-fluid" alt=""></div>
               <div class="swiper-slide"><img src="resources/dhl-1.svg" class="img-fluid" alt=""></div>
            </div>
         </div>
      </div>
   </section>

   </div>
   </div>
   </section><!-- /Services Section -->
   <!-- Call To Action Section -->
   <section id="call-to-action" class="call-to-action section" style="background-color: black;">
      <img src="#" alt="">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-xl-10">
               <div class="text-center">
                  <h3>Call To Action</h3>
                  <p>If you have any question about our brand, feel free to contact our support!</p>
                  <a class="cta-btn" href="#contact">Contact Us</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- /Call To Action Section -->
   <!-- Contact Section -->
   <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" >
         <span class="">Contact</span>
         <h2 class="">Contact</h2>
         <p>Check our conbtact info</p>
      </div>
      <!-- End Section Title -->
      <div class="container"  data-aos-delay="100">
         <div class="row gy-4">
            <div class="col-lg-6">
               <div class="info-item d-flex flex-column justify-content-center align-items-center"  data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Taounate 34000</p>
               </div>
            </div>
            <!-- End Info Item -->
            <div class="col-lg-3 col-md-6">
               <div class="info-item d-flex flex-column justify-content-center align-items-center"  data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+212 5 77 83 08 36</p>
               </div>
            </div>
            <!-- End Info Item -->
            <div class="col-lg-3 col-md-6">
               <div class="info-item d-flex flex-column justify-content-center align-items-center"  data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>brilliancemuseum@gmail.com</p>
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
            </form>
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
            </div>
            <!-- End Contact Form -
         </div>
      </div>
   </section>
   <!-- /Contact Section -->
</main>
<?php
   include 'includes/footer.php';
?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>
<!-- Preloader -->
<!-- Vendor JS Files -->
<script src="bootstrap/Day/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="bootstrap/Day/assets/vendor/php-email-form/validate.js"></script>
<script src="bootstrap/Day/assets/vendor/aos/aos.js"></script>
<script src="bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="bootstrap/Day/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="bootstrap/Day/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="bootstrap/Day/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<!-- Main JS File -->
<script src="bootstrap/Day/assets/js/main.js"></script>
</body>
</html>
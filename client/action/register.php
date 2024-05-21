<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Signup Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../bootstrap/Day/assets/img/favicon.png" rel="icon">
  <link href="../../bootstrap/Day/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../bootstrap/Day/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../bootstrap/Day/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../bootstrap/Day/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../../bootstrap/Day/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../../bootstrap/Day/assets/css/main.css" rel="stylesheet">

</head>
<body class="index-page">

<?php
$page = "login";
include '../../includes/header.php';
?>

<section class="vh-120 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration</h3>
            <form method="post" action="register.php">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" required>
                    <label class="form-label" for="firstName">First Name</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" required>
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">
                  <div data-mdb-input-init class="form-outline datepicker w-100">
                    <input type="text" class="form-control form-control-lg" id="birthdayDate" name="birthdayDate" required>
                    <label for="birthdayDate" class="form-label">Birthday</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <h6 class="mb-2 pb-1">Gender: </h6>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" checked>
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male">
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other">
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="emailAddress" name="emailAddress" class="form-control form-control-lg" required>
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control form-control-lg" required>
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <select class="select form-control-lg" name="subject" required>
                    <option value="" disabled selected>Choose option</option>
                    <option value="Subject 1">Subject 1</option>
                    <option value="Subject 2">Subject 2</option>
                    <option value="Subject 3">Subject 3</option>
                  </select>
                </div>
              </div>
              <div class="mt-4 pt-2">
                <button type="submit" class="btn btn-danger btn-lg">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
// Include footer if needed
include '../../includes/footer.php';
?>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="../../bootstrap/Day/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/php-email-form/validate.js"></script>
<script src="../../bootstrap/Day/assets/vendor/aos/aos.js"></script>
<script src="../../bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

<!-- Main JS File -->
 <script src="../../bootstrap/Day/assets/js/main.js"></script>

</body>

</html>

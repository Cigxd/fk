<?php
session_start(); // Start the session if not already started
require_once '../path/to/checkUserSession.php'; // Include session checking function
include '../../database/config.php'; // Include your database connection

$msg = '';

try {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare SQL statement to check email
        $check_email_sql = "SELECT * FROM client WHERE email = ?";
        $check_email_stmt = $conn->prepare($check_email_sql);
        $check_email_stmt->bind_param('s', $email);
        $check_email_stmt->execute();
        $email_result = $check_email_stmt->get_result();

        if ($email_result->num_rows == 1) {
            // Email exists, fetch the user record
            $user = $email_result->fetch_assoc();
            $hashed_password = $user['password'];

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Password correct, set session and redirect
                $_SESSION['client_id'] = $user['client_id'];
                header("Location: ../home.php");
                exit();
            } else {
                $msg = "Incorrect password!";
            }
        } else {
            $msg = "Email not found!";
        }
    }
} catch (Exception $e) {
    $msg = "Error: " . $e->getMessage();
}

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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

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

<?php include '../../includes/header.php'; ?>

<section class="vh-120 gradient-custom mt-4">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login</h3>
            <form method="POST" action="login.php">
            <?php
            
            if(!empty($msg)){
                echo '
                    <div class="alert alert-danger mt-4" role="alert">
                        '. $msg .'
                    </div>
                ';
            }
            
            ?>
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" required>
                    <label class="form-label" for="email">Email</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required>
                    <label class="form-label" for="password">Create Password</label>
                  </div>
                </div>
              </div>
              <div class="mt-4 pt-2">
                <button type="submit" name="submit" class="btn btn-danger btn-lg">Login</button>
                <a href="register.php" class="btn btn-secondary btn-lg">Create Account</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>
<!-- Vendor JS Files -->
<script src="../../bootstrap/Day/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/aos/aos.js"></script>
<script src="../../bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/glightbox/js/glightbox.min.js"></script>

<!-- Template Main JS File -->
<script src="../../bootstrap/Day/assets/js/main.js"></script>

</body>
</html>

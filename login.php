<?php
include "database/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["emailAddress"]) && isset($_POST["password"])) {
        ///////////////// here im taking the inputs 
        $email_or_username = $_POST["emailAddress"];
        $password = $_POST["password"];
        ////////////////creating queries
        $client_query = "SELECT * FROM client WHERE email = '$email_or_username' AND password = '$password'";
        $admin_query = "SELECT * FROM admin WHERE username='$email_or_username' AND password = '$password'";
        ///////////////making the queries
        $client_sql = mysqli_query($conn,$client_query);
        $admin_sql = mysqli_query($conn,$admin_query);
        //////////////checking
        if(mysqli_num_rows($client_sql) > 0){
          // User is a client
          $_SESSION['user_type'] = 'client';
          $row = mysqli_fetch_assoc($client_sql);
          $_SESSION['id'] = $row['client_id'];
          header("Location: client/home.php?id='" . $row['client_id'] . "'");
          exit();
        }
        elseif(mysqli_num_rows($admin_sql) > 0){
          // User is an admin
          $_SESSION['user_type'] = 'admin';
          $row = mysqli_fetch_assoc($admin_sql);
          $_SESSION['id'] = $row['id'];
          header("Location: admin/dashboard.php?id='" . $row['id'] . "'");
          exit();
        }
        else {
          // Invalid credentials
          echo "Invalid username/email or password";
        }

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="bootstrap/Day/assets/img/favicon.png" rel="icon">
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

<?php $page = "login"; include 'includes/header.php'; ?>

<section class="vh-150 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
            <form method="post" action="login.php">
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="emailAddress" name="emailAddress" class="form-control form-control-lg" required />
                    <label class="form-label" for="emailAddress">Email Or Username</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                    <label class="form-label" for="password">Password</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <a href="signup.php">Don't have an account?</a>
                  </div>
                </div>
              </div>

              <div class="mt-4 pt-2">
                <button data-mdb-ripple-init class="btn btn-danger btn-lg" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include 'includes/footer.php'; ?>

</body>
</html>
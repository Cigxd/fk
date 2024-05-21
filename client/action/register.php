<?php
include '../../database/config.php';

// Enable detailed error reporting for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Helper function to validate and sanitize input
function validateInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = validateInput($_POST['email']);
        $password = validateInput($_POST['password']);
        $company_name = validateInput($_POST['company_name']);
        $company_type = validateInput($_POST['company_type']);
        $company_address = validateInput($_POST['company_address']);
        $legal_company = validateInput($_POST['legal_company']);
        $TAX_id = validateInput($_POST['TAX_id']);
        $created_date = date('Y-m-d H:i:s');

        // Check if email or company name already exists
        $check_email_sql = "SELECT * FROM client WHERE email = ?";
        $check_email_stmt = $conn->prepare($check_email_sql);
        $check_email_stmt->bind_param('s', $email);
        $check_email_stmt->execute();
        $email_result = $check_email_stmt->get_result();

        $check_company_name_sql = "SELECT * FROM client WHERE company_name = ?";
        $check_company_name_stmt = $conn->prepare($check_company_name_sql);
        $check_company_name_stmt->bind_param('s', $company_name);
        $check_company_name_stmt->execute();
        $company_name_result = $check_company_name_stmt->get_result();

        if ($email_result->num_rows > 0) {
            $msg = "Email already exists!";
        } elseif ($company_name_result->num_rows > 0) {
            $msg = "Company name already exists!";
        } else {
            // Hash the password securely
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO client (email, password, company_name, company_type, company_address, legal_company, TAX_id, created_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssssss', $email, $hashed_password, $company_name, $company_type, $company_address, $legal_company, $TAX_id, $created_date);
            $result = $stmt->execute();

            if ($result) {
                // $client_id = $conn->insert_id;
                // $_SESSION['client_id'] = $client_id;
                header('Location: login.php');
                exit();  // Ensure script termination after redirection
            } else {
                $msg = "Error registering!";
            }
        }
    } else {
        $msg = "Error!";
    }
} catch (Exception $e) {
    $msg = "Error: " . $e->getMessage();
    // Log the error or handle it appropriately
    error_log($msg);
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

<section class="vh-120 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration</h3>
            <form method="POST" action="register.php">
            <?php
            
            if(isset($msg)){
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
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="company_name" name="company_name" class="form-control form-control-lg" required>
                    <label class="form-label" for="company_name">Company Name</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="company_type" name="company_type" class="form-control form-control-lg" required>
                    <label class="form-label" for="company_type">Company Type</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="company_address" name="company_address" class="form-control form-control-lg" required>
                    <label class="form-label" for="company_address">Company Address</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="legal_company" name="legal_company" class="form-control form-control-lg" required>
                    <label class="form-label" for="legal_company">Legal Company</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mb-4 pb-2">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="TAX_id" name="TAX_id" class="form-control form-control-lg" required>
                    <label class="form-label" for="TAX_id">TAX ID</label>
                  </div>
                </div>
              </div>
              <input type="hidden" name="created_date" value="<?php echo $created_date; ?>">
              <div class="mt-4 pt-2">
                <button type="submit" name="submit" class="btn btn-danger btn-lg">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Vendor JS Files -->
<script src="../../bootstrap/Day/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/aos/aos.js"></script>
<script src="../../bootstrap/Day/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../bootstrap/Day/assets/vendor/glightbox/js/glightbox.min.js"></script>

<!-- Template Main JS File -->
<script src="../../bootstrap/Day/assets/js/main.js"></script>

</body>
</html>

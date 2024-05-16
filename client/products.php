<?php
include '../database/config.php';

$fossil_query = "SELECT * FROM sub_category WHERE category_id = 1";
$mineral_query = "SELECT * FROM sub_category WHERE category_id = 2";
$meteorite_query = "SELECT * FROM sub_category WHERE category_id = 3";
$jewelry_query = "SELECT * FROM sub_category WHERE category_id = 4";
$fossile_sql = mysqli_query($conn, $fossil_query);
$mineral_sql = mysqli_query($conn, $mineral_query);
$meteorite_sql = mysqli_query($conn, $meteorite_query);
$jewelry_sql = mysqli_query($conn, $jewelry_query);

$sql = "SELECT * FROM `product`";
$product = $conn->query($sql);

function get_cat_name($category_id, $conn)
{
   $sql = "SELECT c.name FROM `sub_category` c WHERE c.id = $category_id";
   $category_name = $conn->prepare($sql);
   $category_name->execute();
   $result = $category_name->get_result();
   return $result->fetch_assoc()['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Catalog</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

   <!-- Favicons -->
   <link href="https://static.wikia.nocookie.net/gtawiki/images/6/6b/Ryder-GTASAde.png/revision/latest?cb=20211113214809" rel="icon">
   <link href="bootstrap/Day/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
       .card-img-actions {
           position: relative;
       }
       .card-img {
           transition: transform 0.3s ease-in-out;
       }
       .card-img:hover {
           transform: scale(1.1);
       }
   </style>
</head>
<body>

<?php include '../includes/header.php'; ?>

<main class="container d-flex mt-50 mb-50">
   <div class="container d-flex justify-content-center mt-50 mb-50">
       <div class="row">
           <?php
           if ($product->num_rows > 0) {
               while ($row = $product->fetch_assoc()) {
                   $product_id = $row['product_id'];
                   $name = $row['name'];
                   $price = $row['price'];
                   $quantity = $row['quantity'];
                   $image = $row['image'];
                   $sub_category_id = $row['sub_category_id'];
                   $sub_category_name = get_cat_name($sub_category_id, $conn);
           ?>
                   <div class="col-md-4 mt-2">
                       <div class="card">
                           <div class="card-body">
                               <div class="card-img-actions">
                                   <img src="<?php echo $image; ?>" class="card-img img-fluid" width="96" height="350" alt="<?php echo $name; ?>">
                               </div>
                           </div>
                           <div class="card-body bg-light text-center">
                               <div class="mb-2">
                                   <h6 class="font-weight-semibold mb-2">
                                       <a href="#" class="text-default mb-2" data-abc="true"><?php echo $name; ?></a>
                                   </h6>
                                   <span class="text-muted" data-abc="true"><?php echo $sub_category_name; ?></span>
                               </div>
                               <p class="mb-0">Product ID: <?php echo $product_id; ?></p>
                               <p class="mb-0">Quantity: <?php echo $quantity; ?></p>
                               <h3 class="mb-0 font-weight-semibold">$<?php echo $price; ?></h3>
                               <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                           </div>
                       </div>
                   </div>
           <?php
               }
           } else {
               echo "No products found.";
           }
           ?>
       </div>
   </div>
</main>

<?php include '../includes/footer.php'; ?>

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
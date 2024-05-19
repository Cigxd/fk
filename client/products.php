<?php
include '../database/config.php';

if (isset($_GET['id'])) {
    $sub_category_id = $_GET['id'];
    $data = getProducts($conn, $sub_category_id);
    
}

function getProducts($conn, $sub_category_id) {
    $sql = "SELECT * FROM `product` WHERE `sub_category_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $sub_category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function get_cat_name($conn, $sub_category_id){
    $sql = "SELECT name FROM sub_category WHERE id = ?";
    $sub_category_name = $conn->prepare($sql);
    $sub_category_name->bind_param('i', $sub_category_id);
    $sub_category_name->execute();
    $result = $sub_category_name->get_result();
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name'];
    } else {
        return "Unknown Category";
    }
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
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

   <section class="mt-4 mb-4" style="background-color: #eee;">
      <div class="container py-5">
         <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
               <div class="card shadow-0 border rounded-3">
                  <?php
                  if(isset($data) && $data->num_rows > 0){
                     while($row = $data->fetch_assoc()){
                        
                        // product_id / name / mineral_envirement / fossile_period / rock_type / price / quantity / created_date/ image / qr_code / description
                        $product_id = $row['product_id'];
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

                        echo '
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                 <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                    <img src="' . $image . '" class="w-100" />
                                    <a href="view_product.php?id=' . $product_id .'">
                                       <div class="hover-overlay">
                                          <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                              <div class="col-md-6 col-lg-6 col-xl-6">
                                 <h5>' . $name .'</h5>
                                 <div class="mt-1 mb-0 text-muted small">
                                    <span>' . get_cat_name($conn, $sub_category_id) .'</span>
                                    <span class="text-primary"> • </span>
                                    <span>' . $mineral_envirement . '</span>
                                    <span class="text-primary"> • </span>
                                    <span>' . $fossile_period . '</span>
                                    <span class="text-primary"> • </span>
                                    <span>' . $rock_type . '</span>
                                 </div>
                                 <p class="text-truncate mb-4 mb-md-0">' . $description .'</p>
                              </div>
                              <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                 <div class="d-flex flex-row align-items-center mb-1">
                                    <h4 class="mb-1 me-1">$' . $price . '</h4>
                                 </div>
                                 ';
                                 if($quantity > 0){
                                    echo '<h6 class="text-success">Available';
                                 }else{
                                    echo '<h6 class="text-danger">Not Available';
                                 }
                                 echo '</h6>
                                 <div class="d-flex flex-column mt-4">
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-lg">Details</button>
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-secondary btn-sm mt-2" type="button">
                                        Add to Cart
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>';
                        echo '
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                <div class="col-md-6">
                                    <img src="' . $image .'" id="modalProductImage" class="img-fluid" alt="Product Image">
                                </div>
                                <div class="col-md-6">
                                    <h4 id="modalProductName"></h4>
                                    <p><strong>Mineral Environment: </strong>' . $mineral_envirement .'<span id="modalMineralEnvironment"></span></p>
                                    <p><strong>Fossil Period: </strong>' . $created_date .'<span id="modalFossilPeriod"></span></p>
                                    <p><strong>Rock Type: </strong>' . $rock_type .'<span id="modalRockType"></span></p>
                                    <p><strong>Price: </strong>' . $price .'<span id="modalPrice"></span></p>
                                    <p><strong>Quantity: </strong>' . $quantity .'<span id="modalQuantity"></span></p>
                                    <p><strong>Created Date: </strong>' . $created_date .'<span id="modalCreatedDate"></span></p>
                                    <p><strong>Description: </strong>' . $description .'</p>
                                    <p id="modalDescription"></p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>QR Code: </strong> <br><br> <span claa="p-4" id="modalQRCode"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS03N6U8egHJfFlWXoL0G3snsgyQyBjAnIKsEV8UCjxag&s" width="100px"></span></p>
                                </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger">Add to Cart</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        ';
                     }
                  }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </section>




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

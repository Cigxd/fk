<?php
function add_to_cart($conn,$product_id){
    $client_id = $_SESSION['client_id'];
    $query = "INSERT INTO `cart` (client_id, product_id,created_date)
              VALUES($client_id, $product_id,NOW())";
    $sql = mysqli_query($conn,$query);
    if(!$sql){
        false;
    }
}
?>
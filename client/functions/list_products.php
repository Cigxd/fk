<?php
include '../../database/config.php';

// function list_products_by_time($conn){
//     $sql = "SELECT * FROM `product` ORDER BY `created_date` DESC LIMIT 4";
//     $proccess = $conn->query($sql);
//     $proccess->execute();

//     return $proccess;
// }


function list_products_by_time($conn) {
    $sql = "SELECT * FROM `product` ORDER BY `created_date` DESC LIMIT 4";
    $result = $conn->query($sql);
    return $result;
}

?>
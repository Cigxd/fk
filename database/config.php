<?php
try{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "brillance";

    $conn = mysqli_connect($host,$user,$pass,$database);
    if(!$conn){
        die("error connecting to the database");
    }
}catch(Exception $e){
    echo "Error: " . $e;
}

?>
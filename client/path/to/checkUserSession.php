<?php
session_start(); // Start the session

/**
 * Check if the user is logged in and return the appropriate HTTP header.
 *
 * @return void
 */
function checkUserSession()
{
    // Check if the user is logged in
    if (isset($_SESSION['client_id'])) {
        // User is logged in
        // Optionally, you can perform additional checks here if needed
    } else {
        // User is not logged in
        // header('HTTP/1.1 401 Unauthorized');
        // header('Content-Type: application/json; charset=UTF-8');
        // $response = [
        //     'message' => 'You are not authorized to access this resource.'
        // ];

        // echo '
        // <div class="m-4">
        //     <h1>Ahya! Ach tatdir nta tema?</h1><br>
        //     <img src="https://s1.akhbarona.com/thumbs/article_large/3/f/Hamadi_553954764.jpg">
        // </div>
        // ';

        header("Location: ../login.php");

        exit;
    }
}
?>

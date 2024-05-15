<?php
session_start();

// Client session check
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'client') {
    // Redirect to login page or other appropriate page
    header("Location: login.php");
    exit();
}

?>

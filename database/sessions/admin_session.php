<?php
session_start();

// Admin session check
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    // Redirect to login page or other appropriate page
    header("Location: ../login.php");
    exit();
}

?>

<?php
$page = 'home';
//require_once '../path/to/checkUserSession.php';
//checkUserSession();

// Destroy the session and unset session variables
session_destroy();
$_SESSION = []; // Clear all session variables

// Redirect to the login page
header("Location: ../../index.php");
exit();
?>

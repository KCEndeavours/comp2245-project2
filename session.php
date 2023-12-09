<?php

// Start session
session_start();


// If user is logged in, redirect to welcome page
if(isset($_SESSION['userid']) && $_SESSION['userid'] !== null) {
    header("Location: welcome.php");  // Redirect the user to the welcome page if they are already logged in
    exit;
}
?>
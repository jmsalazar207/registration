<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if session variable 'userID' exists
if (!isset($_SESSION['userID']) || trim($_SESSION['userID']) == '') {
    header('location: includes/logout.php'); // Redirect to logout (or login)
    exit();
}

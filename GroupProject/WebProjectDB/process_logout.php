<?php
// Start a session
session_start();
include 'config/connn.php';
include 'loginNavbar/loginNavbarr.php';

// Check if the log out button was clicked
if (isset($_POST['logout'])) {
  // Unset all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect the user to the login form
  header('location: loginn_form.php');
}

?>

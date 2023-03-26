<?php
if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
    include 'AdminNav/adNavbar.php';
} else {
     include 'navbar/navbarr.php';
}
?>


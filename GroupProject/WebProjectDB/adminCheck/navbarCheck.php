<?php
if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1) {
    include 'AdminNav/adNavbar.php';
} else if (isset($_SESSION['fldMemberID'])) {
    include 'navbar/navbarr.php';
} else {
    include 'NonMemberNavbar/NonMemNav.php';
}
?>


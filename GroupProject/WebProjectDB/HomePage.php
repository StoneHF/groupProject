<?php
session_start();
include 'config/connn.php';
include 'loginNavbar/loginNavbarr.php';

$varMemberID = $_SESSION['fldMemberID'];

if (isset($_SESSION['fldMemberID'])){
    echo 'User is logged in with fldMemberID' . $_SESSION['fldMemberID'];
}
else{
    echo 'User is not logged in go away ';
}

?>

<?php
session_start();
include 'config/connn.php';
include 'adminCheck/navbarCheck.php';

if (isset($_SESSION['fldMemberID'])){
    //echo 'User is logged in with fldMemberID' . $_SESSION['fldMemberID']; displays member id
}
 else{
    //echo 'User is not logged in go away '; testing purposes - if user isnt logged in
}

?>

<!DOCTYPE html>
<html>

<head>
    <style>
        #text-header{
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 id="text-header">Welcome, Admin! Please use the Navbar to navigate to Admin Pages...</h1>
</body>

</html>

<?php
session_start();
include 'config/connn.php';



// validate input
$varEmail = $_POST['email'];
//validate input and encrypt password
$varPassword = md5($_POST['password']);

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_members` WHERE `fldEmail` = '".$varEmail."' AND `fldPassword` = '".$varPassword."'";

// echo $sql;

$memres = $mysqli -> query($sql);
$row_count = $memres ->num_rows; // asking sql for the amount of rows

// echo $row_count;

echo "SQL query: " . $sql . "<br>";
echo "Number of rows returned: " . $row_count . "<br>";

if($row_count === 1)
{
    echo " Valid Login"; 
    $_SESSION['member'] = "true";
     header('Location: HomePage.php');
}
elseif ($row_count >= 2)
{
    echo " Dodgy Login ";

}

elseif($row_count === 0)
{
   // header('location: signup_form.php');
   echo " Dodgy Login 2 ";
}

// Execute the SQL query and store the result in a variable
$result = $mysqli->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // The query returned at least one row, so fetch the first row
    $row = $result->fetch_assoc();

    // Check if the password matches the one stored in the database
    if (md5($_POST['password']) === $row['fldPassword']) {
        // The password is correct, so store the fldMemberID in the session
        $_SESSION['fldMemberID'] = $row['fldMemberID'];
    }
}
?>
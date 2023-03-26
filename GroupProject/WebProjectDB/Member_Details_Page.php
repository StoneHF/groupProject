<?php
  session_start();
  include 'config/connn.php';
  include 'adminCheck/navbarCheck.php';
?>

<!DOCTYPE html>
<html>
<head>

<style>

      /* define styles here */
</style>


  <title>Your Information</title>

</head>
<body>

<?php
// get the member ID of the logged-in member from the session
$memberID = $_SESSION['fldMemberID'];

$sql = "SELECT `fldMemberID`, `fldEmail`, `fldPassword`, `fldUsername`, `fldFirstname`, `fldLastname`, `fldMobile` FROM `tbl_members` WHERE `fldMemberID` = '$memberID'";


// execute the query and store the result
$result = $mysqli->query($sql);

echo "<div class='container'>";
echo "<h2>Member Information</h2>";
echo "<table class='table table-striped'>";


// iterate over the rows of the result set and print them
while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<th scope='row'>Member ID:</th>";
    echo "<td>" . $row['fldMemberID'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Email:</th>";
    echo "<td>" . $row['fldEmail'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Password:</th>";
    echo "<td>********</td>";
    echo "<td><a href='Change_Password_Form.php' class='btn btn-primary'>Change Password</a></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Username:</th>";
    echo "<td>" . $row['fldUsername'] . "</td>";
    echo "<td><a href='Change_Username_Form.php' class='btn btn-primary'>Change Username</a></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>First Name:</th>";
    echo "<td>" . $row['fldFirstname'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Last Name:</th>";
    echo "<td>" . $row['fldLastname'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th scope='row'>Mobile:</th>";
    echo "<td>" . $row['fldMobile'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";

?>

</body>
</html>

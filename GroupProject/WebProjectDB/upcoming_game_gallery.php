<?php
session_start();
include 'config/connn.php';
include 'adminCheck/navbarCheck.php';

// Check if the fldMemberID session variable is set
if (isset($_SESSION['fldMemberID'])) {
  // The fldMemberID session variable is set, so the user is logged in
 // echo 'User is logged in with fldMemberID: ' . $_SESSION['fldMemberID'];
} else {
  // The fldMemberID session variable is not set, so the user is not logged in
  echo 'User is not logged in';
  header ('Location: loginn_form.php');
}

?>

<html>
<head>
<style>
.gallery {
  margin: 5px;
  border: 1px solid black;
  width: calc(50% - 10px); /* 3 items in a row with 10px gap */
}



.gallery-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 20px;
  width: 90%; /* set a fixed width */
  margin: 0 auto; /* center the container */
  padding-left: 190px;
  padding-right: 1px;
}

/* Styles for tablets */
@media only screen and (max-width: 768px) {
  .gallery-container {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Styles for mobile */
@media only screen and (max-width: 480px) {
  .gallery-container {
    grid-template-columns: 1fr;
  }
}


.gallery:hover {
  border: 1px solid #777;
}

.gallery img {
  display: block;
  width: 100%;
  object-fit: cover;
  object-position: center;
}

.desc {
  padding: 15px;
  text-align: center;
}

.asc-title {
  font-weight: bold;
}


body {
  text-align: center;
}
</style>


</head>
<body>


<div class="gallery-container">
<?php
// for($x=0; $x<=5; $x++)
$sql = "SELECT * FROM `tbl_images` ORDER BY `fldReleaseDate` ASC";

$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
    echo '<div class="gallery">';
    echo '<a target="_blank" href="' . $row['fldPath'] . '">';
    echo '<img src="' . $row['fldPath'] . '" alt="' . $row['fldImageTitle'] . '" width="600" height="400">';
    echo '</a>';
    echo '<div class="desc"><span class="asc-title">' . $row['fldImageTitle'] . '</div>';
    echo '<div class="desc"><span class="asc-title">Platforms:';
    if ($row['fldXbox'] == 1) {
        echo ' Xbox';
    }
    if ($row['fldPlaystation'] == 1) {
        echo ' Playstation';
    }
    if ($row['fldPC'] == 1) {
        echo ' PC';
    }
    echo '</div>';
    echo '<div class="desc"><span class="asc-title">Release Date: ' . $row['fldReleaseDate'] . '</div>';
    echo '</div>';
}

$mysqli->close();
?>
</div>
</body>
</html>
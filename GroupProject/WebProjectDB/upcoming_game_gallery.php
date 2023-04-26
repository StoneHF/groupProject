<?php
session_start();
include 'config/connn.php';
include 'adminCheck/navbarCheck.php';

?>

<!DOCTYPE html>
<html lang="en">

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/projectWebsiteStyle.css">
<style>
.gallery-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  width: 90%; /* set a fixed width */
  margin: 0 auto; /* center the container */
}

.gallery {
  margin: 20px;
  text-align: center;
  border: 1px solid #ccc;
  padding: 10px;
  width: 300px;
}

.gallery:hover {
  border: 1px solid #777;
}

.gallery img {
  max-width: 100%;
  max-height: 300px;
  object-fit: cover;
  object-position: center;
}

.desc {
  margin-top: 10px;
  text-align: center;
  font-weight: bold;
  font-size: 1.2em;
}

</style>


</head>
<body>


<!-- Create the gallery container -->
<div class="gallery-container">
<?php
// Select all images from the tbl_images table and order them by release date in ascending order
$sql = "SELECT * FROM `tbl_images` ORDER BY `fldReleaseDate` ASC";

// Execute the SQL query and store the result in a variable
$result = $mysqli->query($sql);

// Loop through each row returned by the query and display the image and its details in a gallery div
while ($row = $result->fetch_assoc()) {
    echo '<div class="gallery">';
    echo '<a target="_blank" href="' . $row['fldPath'] . '">';
    echo '<img src="' . $row['fldPath'] . '" alt="' . $row['fldImageTitle'] . '" width="600" height="400">';
    echo '</a>';
    echo '<div class="desc"><span class="asc-title">' . $row['fldImageTitle'] . '</div>';
    echo '<div class="desc"><span class="asc-title">Platforms:';

    // Check which platforms the image is available on and display them
    if ($row['fldXbox'] == 1) {
        echo ' Xbox,';
    }
    if ($row['fldPlaystation'] == 1) {
        echo ' Playstation,';
    }
    if ($row['fldPC'] == 1) {
        echo ' PC';
    }

    // Display the release date for the image
    echo '</div>';
    echo '<div class="desc"><span class="asc-title">Release Date: ' . $row['fldReleaseDate'] . '</div>';
    echo '</div>';
}

$mysqli->close();
?>
</div>
</body>
</html>

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

<title>Competition Results Gallery</title>
  <style>
    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
      }
      .image {
        margin: 20px;
        text-align: center;
        border: 1px solid #ccc;
        padding: 10px;
        width: 300px;
      }
      .image img {
        max-width: 100%;
        max-height: 300px;
      }
      .image p {
        margin: 10px 0;
      }
      .image .ranking {
        font-weight: bold;
        font-size: 1.2em;
        margin-bottom: 5px;
      }
  </style>
</head>
<body>

<!-- drop down for users to select year-->
<form method="post">
  <label for="year">Select a year:</label>
  <select name="year" id="year">
    <option value="all">All years</option>
    <option value="2023">2023</option>
    <option value="2022">2022</option>
    <option value="2021">2021</option>
    <option value="2020">2020</option>
    <!-- Add more options for other years if needed -->
  </select>
  <button type="submit">Submit</button>
</form>


  <h1>Competition Results Gallery</h1>
  <div class="gallery">
    <?php
// Set the default year to "all" if none is selected
$selected_year = isset($_POST['year']) ? $_POST['year'] : 'all';

// Fetch the images and their total points from the table based on the selected year, if any
$sql = "SELECT tbl_comp_game_images.fldPath, tbl_comp_results.fldTotalPoints, tbl_comp_results.fldCompImageID
        FROM tbl_comp_results
        INNER JOIN tbl_comp_game_images
        ON tbl_comp_results.fldCompImageID = tbl_comp_game_images.fldCompImageID";

if ($selected_year != 'all') {
  $sql .= " WHERE YEAR(tbl_comp_game_images.fldReleaseDate) = $selected_year";
}

$sql .= " GROUP BY tbl_comp_results.fldCompImageID
          ORDER BY fldTotalPoints DESC";
$result = mysqli_query($mysqli, $sql);


    // Check for errors with the query
    if (!$result) {
        echo "Error: " . mysqli_error($mysqli);
    }

    // Loop through the results and display each image with its total points and ranking
    $ranking = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $ranking++;
        echo "<div class='image'>";
        echo "<div class='ranking'>Rank ".$ranking."</div>";
        echo "<img src='".$row['fldPath']."' alt='Competition Image'>";
        echo "<p>Total Points: ".$row['fldTotalPoints']."</p>";
        echo "</div>";
    }
?>

</div>

</body>
</html>

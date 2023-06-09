<?php
session_start(); // start the session
include 'config/connn.php'; // include database connection file
include 'adminCheck/navbarCheck.php'; // include navbar checking file
$varMemberID = $_SESSION['fldMemberID']; // get member ID from session
?>

<!DOCTYPE html>
<html lang="en">



<head>
<link rel="stylesheet" type="text/css" href="css/projectAdminWebsiteStyle.css">
    <title>Image Upload Form</title>
    <style>
      /* Add some styling to make the form look better */
      body {
        background-color: #eee;
        font-family: sans-serif;
        text-align: center;
      }

      form {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        margin: 50px auto;
        max-width: 500px;
        padding: 20px;
      }

      label {
        color: #333;
        display: block;
        margin-bottom: 10px;
      }

      input[type="text"],
      input[type="file"] {
        background-color: #f5f5f5;
        border: 1px solid #ccc;
        box-sizing: border-box;
        display: block;
        font-size: 16px;
        margin: 0 0 20px 0;
        padding: 8px;
        width: 100%;
      }

      input[type="submit"] {
        background-color: #333;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        padding: 12px 20px;
      }

      input[type="submit"]:hover {
        background-color: #444;
      }
    </style>
  </head>
  <body>


   <!-- Add a heading for the form -->
  <h2> Add upcoming games </h2>
  
<!-- Create the form for image upload -->
<form action="process_game_image_upload.php" method="post" enctype="multipart/form-data">
  <label for="title">Image Title:</label>
  <input type="text" name="title" id="title" required>
  <br><br>
  <label for="fileToUpload">Select image to upload:</label>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br><br>
  <label for="xbox">Playable on Xbox:</label>
  <input type="checkbox" name="xbox" id="xbox" value="1">
  <br>
  <label for="playstation">Playable on PlayStation:</label>
  <input type="checkbox" name="playstation" id="playstation" value="1">
  <br>
  <label for="pc">Playable on PC:</label>
  <input type="checkbox" name="pc" id="pc" value="1">
  <br><br>
  <label for="releaseDate">Release Date:</label>
  <input type="date" name="releaseDate" id="releaseDate" required>
  <br><br>

  <!-- Add a submit button for the form -->
  <input type="submit" value="Upload Image" name="submit">
</form>


  </body>
</html>

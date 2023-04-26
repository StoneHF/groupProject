<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'config/connn.php';
include 'adminCheck/navbarCheck.php';
$varMemberID = $_SESSION['fldMemberID'];
 
?>






<head>
<link rel="stylesheet" type="text/css" href="css/projectAdminWebsiteStyle.css">
    <title>Create News Articles</title>
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

  <h2> Add News Articles </h2>

  <form action="process_news_create.php" method="post" enctype="multipart/form-data">
  <label for="title">News Title:</label>
  <input type="text" name="title" id="title">
  <br><br>
  <label for="author">Author:</label>
  <input type="text" name="author" id="author">
  <br><br>
  <label for="description">Short Description:</label>
  <input type="text" name="description" id="description">
  <br><br>
  <label for="article">Article:</label>
  <input type="text" name="article" id="article">
  <br><br>
  <input type="submit" value="Add News" name="submit">
</form>

  </body>
</html>

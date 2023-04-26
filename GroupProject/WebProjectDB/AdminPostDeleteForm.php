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
    <title>Delete Post Form</title>
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

  <h2> Delete Posts </h2>

  <form action="process_post_delete.php" method="post" enctype="multipart/form-data"> <!-- form created -->
  <label for="post-list">Select news article to delete:</label>
  <select id="post-list" name="post-list"> <!-- create dropdown list -->

  <?php
    $sql = "SELECT * FROM `gnnwebsitedb`.`tbl_forum_posts`"; //select all posts
    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc()){ //loops until no more records left to process in post table
    $postID = $row['fldPostID']; //save postid to variable
    $postTitle = $row['fldPostTitle']; //save postname to variable

    ?>

    <option value=<?php echo $postID ?>><?php echo $postTitle ?></option> <!-- create option in dropdown list -->

    <?php
    }
?>

  </select>
  <br><br>
  <input type="submit" value="Delete Post" name="submit">
  </form>

  </body>
</html>

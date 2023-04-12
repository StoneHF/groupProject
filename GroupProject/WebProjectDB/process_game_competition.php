<?php
session_start();
include 'config/connn.php'; // include database connection file

$target_dir = "Images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // set target file path
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$imageTitle = $_POST['title']; // get image title from form
$releaseDate = $_POST['releaseDate']; // get release date from form

if($_FILES["fileToUpload"]["size"] >=5000000)
{
    echo "Sorry File is too large";
    $uploadOK = 0;
}

if($uploadOK == 0)
{
    echo ".. Sorry file not uploaded";
} else {
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
    {
        // prepare statement to insert data into database
        $stmt = $mysqli->prepare("INSERT INTO `gnnwebsitedb`.`tbl_comp_game_images`(`fldCompImageID`, `fldImageTitle`, `fldPath`, `fldReleaseDate`) VALUES (NULL, ?, ?, ?)");

        // bind parameters to the prepared statement
        $stmt->bind_param("sss", $imageTitle, $target_file, $releaseDate);

        if ($stmt->execute()) {
            header('Location: competition_image_upload_form.php');
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    } else {
        echo "file not uploaded";
    }
}

?>

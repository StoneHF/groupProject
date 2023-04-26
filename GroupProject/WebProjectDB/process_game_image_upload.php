<?php
session_start(); // start session for user authentication
include 'config/connn.php'; // include database connection file

$target_dir = "Images/"; // specify the directory where images will be stored
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // set the target file path
$uploadOK = 1; // variable to check if the file can be uploaded
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension
$imageTitle = $_POST['title']; // get the image title from form data
$xbox = isset($_POST['xbox']) ? $_POST['xbox'] : 0; // check if Xbox checkbox is checked
$playstation = isset($_POST['playstation']) ? $_POST['playstation'] : 0; // check if PlayStation checkbox is checked
$pc = isset($_POST['pc']) ? $_POST['pc'] : 0; // check if PC checkbox is checked
$releaseDate = $_POST['releaseDate']; // get the release date from form data

if($_FILES["fileToUpload"]["size"] >=5000000) // check if the file size is greater than 5MB
{
    echo "Sorry File is too large";
    $uploadOK = 0;
}

if($uploadOK == 0) // if the file cannot be uploaded, show an error message
{
    echo ".. Sorry file not uploaded";
} else {
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) // if the file can be uploaded, move it to the target directory
    {
        $sql = "INSERT INTO `gnnwebsitedb`.`tbl_images`(`fldImageID`, `fldImageTitle`, `fldPath`, `fldXbox`, `fldPlaystation`, `fldPC`, `fldReleaseDate`)  
                    VALUES
                        (NULL,'".$imageTitle."','".$target_file."','".$xbox."','".$playstation."','".$pc."','".$releaseDate."')"; // create an SQL query to insert the image details into the database

        if ($mysqli->query($sql) === TRUE) { // execute the query and check if it was successful
            header('Location: game_image_upload_form.php'); // redirect to the image upload form page
        } 
    } else {
        echo "file not uploaded"; // show an error message if the file cannot be uploaded
    }
}
?>

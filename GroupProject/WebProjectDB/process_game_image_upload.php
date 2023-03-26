<?php
session_start();
include 'config/connn.php';

$target_dir = "Images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));    
$imageTitle = $_POST['title'];
$xbox = isset($_POST['xbox']) ? $_POST['xbox'] : 0;
$playstation = isset($_POST['playstation']) ? $_POST['playstation'] : 0;
$pc = isset($_POST['pc']) ? $_POST['pc'] : 0;
$releaseDate = $_POST['releaseDate'];

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
        $sql = "INSERT INTO `gnnwebsitedb`.`tbl_images`(`fldImageID`, `fldImageTitle`, `fldPath`, `fldXbox`, `fldPlaystation`, `fldPC`, `fldReleaseDate`)  
                    VALUES
                        (NULL,'".$imageTitle."','".$target_file."','".$xbox."','".$playstation."','".$pc."','".$releaseDate."')";

        if ($mysqli->query($sql) === TRUE) {
            header('Location: game_image_upload_form.php');
        } 
    } else {
        echo "file not uploaded";
    }
}
?>

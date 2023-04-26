<?php
session_start();
include 'config/connn.php';

$titleForum = $_POST['title']; //saving title of the forum


$sql = "INSERT INTO `gnnwebsitedb`.`tbl_forums`(`fldForumID`, `fldForumName`)  
        VALUES
        (NULL,'".$titleForum."')"; //inserting forum title into the forum table

        if ($mysqli->query($sql) === TRUE) { //if query was created
            header('Location: AdminForumCreateForm.php');
        } 
        else {
            echo "Error - please try again.";
        }

?>

<?php
session_start();
include 'config/connn.php';

$titleNews = $_POST['title']; //saving title of news
$authorNews = $_POST['author']; //saving author of news
$descriptionNews = $_POST['description']; //saving description of news
$articleNews = $_POST['article']; //saving article of news


$sql = "INSERT INTO `gnnwebsitedb`.`tbl_news`(`fldNewsID`, `fldNewsTitle`, `fldAuthor`, `fldNewsDescription`, `fldNewsArticle`)  
        VALUES
        (NULL,'".$titleNews."','".$authorNews."','".$descriptionNews."','".$articleNews."')"; //insert news variables into the news table

        if ($mysqli->query($sql) === TRUE) { //if sql query was carried out successfully
            header('Location: AdminNewsCreateForm.php');
        } 
        else {
            echo "Error - please try again.";
        }

?>

<?php
session_start();
include 'config/connn.php';

$selectedForum = $_POST["createpost"]; //get value from createpost button

$sql = "INSERT INTO `gnnwebsitedb`.`tbl_temp_forum_link` (`fldLink`)
VALUES ('".$selectedForum."')"; //insert variable from createpost button into the temp table
$result = $mysqli->query($sql);

header('Location: CreateForumPostForm.php'); //take user to createforumpostform page

?>
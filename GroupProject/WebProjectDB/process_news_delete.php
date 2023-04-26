<?php
session_start();
include 'config/connn.php';
 
$newsID = $_POST['news-list']; //this saves the selected news id to a variable

//echo $newsID; //for testing

if(isset($newsID)){ //if newsid variable is set
    $sql = "DELETE FROM `gnnwebsitedb`.`tbl_news` WHERE `fldNewsID` = $newsID"; //delete news
    $result = $mysqli->query($sql);
    $deletedNews = true;
}

if($deletedNews == true){ //if news was deleted
    //echo "deleted"; for testing
    header('Location: admin_home_page.php');
}
else{
    echo "Error deleting news - please try again.";
}

?>

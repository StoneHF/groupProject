<?php
session_start();
include 'config/connn.php';
 
$postID = $_POST['post-list']; //this saves the selected post id to a variable

//echo $postID; //for testing

if(isset($postID)){ //if postid variable is set
    $sql = "DELETE FROM `gnnwebsitedb`.`tbl_forum_posts` WHERE `fldPostID` = $postID"; //delete post
    $result = $mysqli->query($sql);
    $deletedPost = true;
}

if($deletedPost == true){ //if post was deleted
    //echo "deleted"; for testing
    header('Location: admin_home_page.php');
}
else{
    echo "Error deleting post - please try again.";
}

?>

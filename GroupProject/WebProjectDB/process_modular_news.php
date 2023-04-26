<?php
session_start();
include 'config/connn.php';

$buttonNumIncrement = 0;

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_news`"; //select all from news table
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()){
    if (isset($_POST[$buttonNumIncrement])){
        //echo 'Button ' .$buttonNumIncrement. ' posted.';
        //echo $_POST[$buttonNumIncrement];
        $newsLink = $_POST[$buttonNumIncrement];
        //$postedButton = $buttonNumIncrement; not sure if i need this

        $sql2 = "INSERT INTO `gnnwebsitedb`.`tbl_temp_forum_link` (`fldLink`)
        VALUES ('".$newsLink."')"; //add link to temp table
        $result2 = $mysqli->query($sql2);

        header('Location: ModularNewsPage.php');
    }
    else{
        //echo 'Button ' .$buttonNumIncrement. ' did not post.';
    }
    $buttonNumIncrement++;
}

?>
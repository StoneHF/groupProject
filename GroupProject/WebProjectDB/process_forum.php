<?php
session_start();
include 'config/connn.php';

$buttonNumIncrement = 0; //creates variable

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_forums`"; //select all from forum table
$result = $mysqli->query($sql); //run query

while ($row = $result->fetch_assoc()){ //while loop for each row in table
    if (isset($_POST[$buttonNumIncrement])){ //if a button was clicked (button linked to variable created earlier)
        //echo 'Button ' .$buttonNumIncrement. ' posted.';
        //echo $_POST[$buttonNumIncrement];
        $pageLink = $_POST[$buttonNumIncrement]; //create pagelink variable with button output
        //$postedButton = $buttonNumIncrement; not sure if i need this

        $sql2 = "INSERT INTO `gnnwebsitedb`.`tbl_temp_forum_link` (`fldLink`)
        VALUES ('".$pageLink."')"; //insert link variable into temp table
        $result2 = $mysqli->query($sql2);

        header('Location: ForumPage.php'); //take user back to forum page
    }
    else{
        //echo 'Button ' .$buttonNumIncrement. ' did not post.';
    }
    $buttonNumIncrement++; //increment button variable
}

//echo $postedButton;

?>
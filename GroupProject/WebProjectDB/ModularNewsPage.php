<?php

session_start();
include 'config/connn.php';
include 'adminCheck/navbarCheck.php';

//$varMemberID = $_SESSION['fldMemberID'];

if (isset($_SESSION['fldMemberID'])){
    //user is logged in

    //echo 'User is logged in with fldMemberID' . $_SESSION['fldMemberID'];
}
else{                                 //add pop up boxes instead of echo
    //user is not logged in
    //echo 'User is not logged in go away '; change this for a toast notification or model
    header('Location: loginn_form.php');
}

//html container and give different displays to each variable container in the css style sheet


?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/projectWebsiteStyle.css">
    <style> /* inline style sheet for news page */
        #text-header{
            text-align: center;
        }
        #news-article-container{
            display: flex;
            padding:20px;
            background-color: burlywood;
            margin-top: 25px;
            margin-left: 25%;
            margin-right: 25%;
        }
        #author-container{
            display: flex;
            padding:20px;
            background-color: burlywood;
            margin-top: 25px;
            margin-left: 25%;
            margin-right: 25%;
        }
        #button-container{
            display: flex;
            padding:20px;
            margin-top: 25px;
            margin-left: 25%;
            margin-right: 25%;
        }
    </style>
</head>

<?php

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_temp_forum_link`"; //select all from temp forum table
$result = $mysqli->query($sql); //run query

//if result fetch assoc then $link = true then go to another if statement

if ($result->fetch_assoc()){ //if temp table has a record in
    $tempForum = true; //tempforum set to true
}
else{ //if no record in the table
    $tempForum = false; //tempforum set to false
}

if ($tempForum == true){
    $sql = "SELECT * FROM `gnnwebsitedb`.`tbl_temp_forum_link`"; //select all from temp table
    $result = $mysqli->query($sql); //run query
    while($row = $result->fetch_assoc()){ //essentially this just runs the following code for as many rows in the temp table
        $newsLink = $row['fldLink']; //save link in temp table to a variable
        //echo $forumLink; for testing purposes

        $sql2 = "SELECT * FROM `gnnwebsitedb`.`tbl_news` WHERE `fldNewsID` = $newsLink"; //new sql query to search news table for news matching the temp variable
        $result2 = $mysqli->query($sql2);

        while($row = $result2->fetch_assoc()){ 
            $newsID = $row['fldNewsID'];
            $newsTitle = $row['fldNewsTitle']; //saving variables from the correct news record
            $newsAuthor = $row['fldAuthor'];
            $newsDescription = $row['fldNewsDescription'];
            $newsArticle = $row['fldNewsArticle'];

            ?>

            <body>
                <h1 id="text-header"><?php echo $newsTitle ?></h1> <!-- this is the creation of the news display -->
                <div id="modular-forum-container">
                    <div id="news-article-container">
                        <p1 id="news-article"><?php echo $newsArticle ?></p1>
                    </div>
                    <div id="author-container">
                        <p1 id="author-info">Article Author: <?php echo $newsAuthor ?> <!-- php statements to display variables -->
                    </div>
                    <div id="button-container">
                        <form action="NewsPage.php">
                            <input type="submit" value="Go back to News" />
                        </form>
                    </div>
            </body>

            <?php

        }

    }
    $sql = "DELETE FROM `gnnwebsitedb`.`tbl_temp_forum_link` WHERE `fldLink` = $newsLink"; //delete the record from the temp link database
    $result = $mysqli->query($sql);
}
else{
    echo "\nError - No link in temp database. Redirecting to News Page..."; //if no link exists in the temp database
    ?>

    <script type="text/javascript">
        window.location.href="ForumPage.php";
    </script>

    <?php
}

?>


</html>
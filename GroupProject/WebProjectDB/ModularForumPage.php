<?php

session_start(); //start session
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
    <style> /* style sheet */
        #text-header{
            text-align: center;
        }
        #post-description-container{
            display: flex;
            padding:20px;
            background-color: burlywood;
            margin-top: 25px;
            margin-left: 25%;
            margin-right: 25%;
        }
        #member-container{
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

//get db link here to use for title of page

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_temp_forum_link`"; //link to temp table
$result = $mysqli->query($sql);


if ($result->fetch_assoc()){ //if there is something in the temp table
    $tempForum = true;
}
else{
    $tempForum = false;
}

if ($tempForum == true){
    $sql = "SELECT * FROM `gnnwebsitedb`.`tbl_temp_forum_link`"; //select what is in the temp table
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
        $postLink = $row['fldLink']; //save row in temp table
        //echo $forumLink;

        $sql2 = "SELECT * FROM `gnnwebsitedb`.`tbl_forum_posts` WHERE `fldPostID` = $postLink"; //select from forum posts where id is the same as variable postlink
        $result2 = $mysqli->query($sql2);

        while($row = $result2->fetch_assoc()){
            $postID = $row['fldPostID'];
            $memberID = $row['fldMemberID']; //save variables
            $postTitle = $row['fldPostTitle'];
            $postDescription = $row['fldPostDescription'];


            $sql = "SELECT * FROM `gnnwebsitedb`.`tbl_members` WHERE `fldMemberID` = $memberID"; //select from member table with variable memberid
            $result = $mysqli->query($sql);

            while($row = $result->fetch_assoc()){
                $memberUsername = $row['fldUsername']; //save username as variable
            }

            ?>

            <body>
                <h1 id="text-header"><?php echo $postTitle ?></h1>
                <div id="modular-forum-container"> <!-- CREATING THE ACTUAL FORUM DISPLAY -->
                    <div id="post-description-container">
                        <p1 id="post-description"><?php echo $postDescription ?></p1>
                    </div>
                    <div id="member-container">
                        <p1 id="member-info">Posted by <?php echo $memberUsername ?>
                    </div>
                    <div id="button-container">
                        <form action="ForumPage.php">
                            <input type="submit" value="Go back to Forums" />
                        </form>
                    </div>
            </body>

            <?php

        }

    }
    $sql = "DELETE FROM `gnnwebsitedb`.`tbl_temp_forum_link` WHERE `fldLink` = $postLink"; //DELETE CURRENT RECORD FROM TEMP TABLE
    $result = $mysqli->query($sql);
        
}
else{
    echo "\nError - No link in temp database. Redirecting to Forum Page..."; //if nothing in temp table
    ?>

    <script type="text/javascript">
        window.location.href="ForumPage.php"; //redirect to forum page
    </script>

    <?php
}

?>


</html>
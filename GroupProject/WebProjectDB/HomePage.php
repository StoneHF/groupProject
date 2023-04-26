<?php
session_start(); //starts session
include 'config/connn.php'; //include connection to database
include 'adminCheck/navbarCheck.php'; //include file to check what navbar to display

//$varMemberID = $_SESSION['fldMemberID']; not necessary code


if (isset($_SESSION['fldMemberID'])){ //if session is set
    //echo 'User is logged in with fldMemberID' . $_SESSION['fldMemberID']; displays member id
}
 else{ //if session is not set
    //echo 'User is not logged in go away '; testing purposes - if user isnt logged in
}

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/projectWebsiteStyle.css"> <!-- link to css style sheet -->
    <style> /* CSS INLINE STYLE SHEET */
        #text-header{
            text-align: center;
        }
        .home {
        margin: 5px;
        border: 1px solid black;
        width: calc(50% - 10px); /* 3 items in a row with 10px gap */
        }
        .home-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 30px;
        width: 80%; /* set a fixed width */
        margin: 0 auto; /* center the container */
        padding-left: 190px;
        padding-right: 1px;
        padding-top: 8%;
        }
        .home:hover {
        border: 1px solid #777;
        }
        .home img {
        display: block;
        width: 100%;
        object-fit: cover;
        object-position: center;
        }

        .desc {
        padding: 15px;
        text-align: center;
        }
        .asc-title {
        font-weight: bold;
        }
        body {
        text-align: center;
        }
    </style>
</head>

<body>

<!--<div class="animation-area">  live background div 
    <ul class="box-area">  a list with all the objects which are animated in the background 
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    </div> -->

<h1 id="text-header">Home Page</h1> <!-- page title -->

<div class="home-container"> <!-- container for the page -->

<?php

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_news` ORDER BY `fldNewsID` DESC"; //select all from news table
$result = $mysqli->query($sql); //run query above

if($row = $result->fetch_assoc()){ //if there is a value in the news table

    echo '<div class="home">'; //the code below makes a card on the home page for latest news
    echo '<h1 id="text-header">Latest News</h1>';
    echo '<div class="desc"><span class="asc-title">' . $row['fldNewsTitle'] . '</div>';
    echo '<div class="desc"><span class="asc-title">Author: ' . $row['fldAuthor'] . '</div>';
    echo '<div class="desc"><span class="asc-title">' . $row['fldNewsDescription'] . '</div>';
    echo '<form action="NewsPage.php" method="post">';
    echo '<button class="desc" action="NewsPage.php">Go to News Page</button>';
    echo '</form>';
    echo '</div>';

}

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_images` ORDER BY `fldReleaseDate` ASC"; //select all from game image table
$result = $mysqli->query($sql); //run above query

if($row = $result->fetch_assoc()){ //if there is a result in the table

    echo '<div class="home">'; //the code below makes a card to display an upcoming release
    echo '<h1 id="text-header">Upcoming Release</h1>';
    echo '<a target="_blank" href="' . $row['fldPath'] . '">';
    echo '<img src="' . $row['fldPath'] . '" alt="' . $row['fldImageTitle'] . '" width="600" height="400">';
    echo '</a>';
    echo '<div class="desc"><span class="asc-title">' . $row['fldImageTitle'] . '</div>';
    echo '<div class="desc"><span class="asc-title">Platforms:';
    if ($row['fldXbox'] == 1) {
        echo ' Xbox';
    }
    if ($row['fldPlaystation'] == 1) {
        echo ' Playstation';
    }
    if ($row['fldPC'] == 1) {
        echo ' PC';
    }
    echo '</div>';
    echo '<div class="desc"><span class="asc-title">Release Date: ' . $row['fldReleaseDate'] . '</div>';
    echo '</div>';

}

?>

</div>

</body>

</html>

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


?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/projectWebsiteStyle.css">
    <style>
        #text-header{
            text-align: center;
        }
        #news-container{
            display: flex;
            padding:20px;
            background-color: burlywood;
            margin-top: 50px;
            margin-left: 25%;
            margin-right: 25%;
        }
        #news-title-div{
            display: flex;
            padding:10px;
        }
        #news-description-div{
            display: flex;
            padding:10px;
        }
        #news-author-div{
            display: flex;
            padding:10px;
        }
        #news-button-div{
            display: flex;
            padding:10px;
        }
    </style>
</head>

<body>
    <h1 id="text-header">News</h1> <!-- news header -->
    <div id="news-page-container">
<?php

$sql = "SELECT * FROM `gnnwebsitedb`.`tbl_news`"; //select all from news table
$result = $mysqli->query($sql);

$buttonNumber = 0; //variable created for making unique buttons

while ($row = $result->fetch_assoc()){ //loops for each row in the table
    $newsID = $row['fldNewsID'];
    $newsTitle = $row['fldNewsTitle'];
    $newsAuthor = $row['fldAuthor']; //saving variables from the table
    $newsDescription = $row['fldNewsDescription'];
    $newsArticle = $row['fldNewsArticle'];

    ?>
        <div id="news-container">
            <div id="news-title-div">
                <h2 id="news-title"><?php echo $newsTitle ?></p1>
            </div>
            <div id="news-description-div">
                <p1 id="news-description"><?php echo $newsDescription ?></p1> <!-- making a news section with info from the table -->
            </div>
            <div id="news-author-div">
                <p1 id="news-author"><?php echo $newsAuthor ?></p1>
            </div>
            <form action="process_modular_news.php" method="post">
                <div id="news-button-div">
                    <button id="news-button" name=<?php echo $buttonNumber ?> value=<?php echo $newsID ?>>View News</button> <!-- the button that will send data to temp table and take user to modular page -->
                </div>
            </form>
        </div>
    

    <?php

    $buttonNumber++; //increment button number so each button is unique

}

?>

</div>

</body>
</html>
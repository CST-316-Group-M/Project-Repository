<!--
Author: Jordan Smith
Last Revise: 4/22/14
-->
<!doctype html>
<?php
//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();
$uname = $_SESSION['email'];
$fname = $_SESSION['fname'];
$arr = explode("@", $uname);			//php explode function splits strings
$uname= $arr[0];

include_once 'func.php';// this is telling the page to include func.php in the page functions
connect();//calling the connect function

?>
<!--This begins the HTML Version of the page.-->
<html>
    <head>
        <meta charset="UTF-8">
                <!--The HTML Link Tab is what allows us to link various files to the page so we can call on them when they need it.-->
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Management</title>
        <link rel="stylesheet" type="text/css" href="style_main.css">
        <link rel="stylesheet" type="text/css" href="template_main.css">
        <link rel="stylesheet" type="text/css" href="directory.css">
        <link rel="stylesheet" href="./style.css">
        <script src="./.sorttable.js"></script>
    </head>
    <body>
		  <!--div Class's allow for me to be able to edit multiple elements togethor or speratley.-->
        <div class="container1">
        <div class="username"><h1><?=$fname?> see who else is using Group M Project Management!</h1></div>
        <div class="sboxed"></div>
        <div class="hboxed"><h1>Group M Project Management</h1></div>
        <div class="messenger"><center><h3>Messenger Client</h3></center></div>
        <div class="hboxed2"> </div>
                <!--navbar class is the container that holds the navigation bar-->
        <div class="navbar">
            <ul>
		<div class="barcontainer">
                <div class="bar"><a href="index_main.php">Home</a></div> 
                <div class="bar"><a href="directory.php">Directory</a></div>
                <div class="bar"><a href="settings.php">Settings</a></div> 
                <div class="bar"><a href="index_profile.php">Profile</a></div>
                <div class="bar"><a href="logout.php">Log Out</a></div>
		</div>
            </ul>
		
        </div>
                <!--The img class is the class that defines the properties of the user image-->
    <img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">

<div class="dirlist"><!--This is the container that creates the box for the user lists.-->
        <h1 style="text-align:center;"><u>Group M Project Management User Directory</u></h1>            

            <ul name="USERS" >
            <!-- Opens the query, and gets the information processed for display into an unordered list-->
            <?php query() ?>

            </ul>
                    <!-- closes the query  -->
            <?php close() ?>
</div>
	


        
    </body>
</html>
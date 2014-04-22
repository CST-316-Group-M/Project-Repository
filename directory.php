<!doctype html>
<?php
session_start();
$uname = $_SESSION['email'];
$fname = $_SESSION['fname'];
$arr = explode("@", $uname);			//php explode function splits strings
$uname= $arr[0];


?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Management</title>
        <link rel="stylesheet" type="text/css" href="style_main.css">
        <link rel="stylesheet" type="text/css" href="template_main.css">
        <link rel="stylesheet" type="text/css" href="directory.css">
        <link rel="stylesheet" href="./style.css">
        <script src="./.sorttable.js"></script>
    </head>
    <body>
		
        <div class="container1">
        <div class="username"><h1></h1></div>
	<div class="sboxed"></div>
        <div class="hboxed"><h1>Group M Project Management</h1></div>
        <div class="messenger"><center><h3>Messenger Client</h3></center></div>
        <div class="hboxed2"> </div>
        <div class="navbar">
            <ul>
		<div class="barcontainer">
                <div class="bar"><a href="index_main.php">Home</a></div> 
                <div class="bar"><a href="directory.php">Directory</a></div>
                <div class="bar"><a href="#">How to</a></div> 
                <div class="bar"><a href="settings.php">Settings</a></div> 
                <div class="bar"><a href="index_profile.php">Profile</a></div>
                <div class="bar"><a href="logout.php">Log Out</a></div>
		</div>
            </ul>
		
        </div>
<div class="dirlist">
        <section>
            <article>
            <hgroup>
            </hgroup>
            
            <p align="center">
 
            <ul name="USERS" >
            <!-- Opens the query, and gets the information processed for display into an unordered list-->
            <?php query() ?>

                </ul>
                    <!-- closes the query  -->
                    <?php close() ?>
                </p>
            </article>
        

        </section>
        

</div>
	<img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
        
    </body>
</html>
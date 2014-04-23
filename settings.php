<!doctype html>
<?php

//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();
$uname = $_SESSION['email'];
$fname = $_SESSION['fname'];
$arr = explode("@", $uname);			//php explode function splits strings
$uname= $arr[0];

//The php functionality below this comment is the php code that allows for users to be able to change their password. This function only works inside the settings.php file.
$con=mysqli_connect("localhost","webauth","webauth","CST316");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit1'])){
    if (($_POST['password']) == ($_POST['password1'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = sha1($password);
    mysqli_query($con, "UPDATE users SET password = '".$password."' WHERE email = '".$email."'");
    }
    else{
    echo "passwords do not match!";
    }
}
mysqli_close($con);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!--This begins the HTML Scripting for the entire page-->
<html>
    <head>
        <meta charset="UTF-8">
        <!--The HTML Link Tab is what allows us to link various files to the page so we can call on them when they need it.-->
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Management</title>
        <link rel="stylesheet" type="text/css" href="style_main.css">
        <link rel="stylesheet" type="text/css" href="template_main.css">
        <link rel="stylesheet" href="settings.css">
        <script src="./.sorttable.js"></script>
    </head>
    <body>
		<!--div Class's allow for me to be able to edit multiple elements togethor or speratley.-->
        <div class="container1">
        <div class="username"><h1>Welcome <?=$fname?> to your User Settings!</h1></div>
	<div class="sboxed"></div>
        <div class="hboxed"><h1>Group M Project Management</h1></div>
        <div class="hboxed2"> </div>
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
        <!--THe below method is so that the user can successfully change their password when they need to-->
        <div class="passwd">
        <form method="post" action="settings.php">
            Email: <input type="email" name="email"><br><br>
            Password: <input type="password" name="password"><br><br>
            Password again: <input type="password" name="password1"><br><br>
            <input type="submit" name="submit1" value="submit">
        </form>
    </div>
    <!--The img class is the class that defines the properties of the user image-->
	<img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
        
    </body>
</html>
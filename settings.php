<!doctype html>
<?php

//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();
$uname1 = $_SESSION['email'];
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
    //connect to database
    $con = mysqli_connect("localhost","webauth","webauth","CST316"); 
    $info = mysqli_query($con, "SELECT * FROM users WHERE email='". $uname1 ."'");
    $row = mysqli_fetch_array($info);


    //When you click the submit button.
    if(isset($_POST['submit']))
            {
               // Putting data from textbox into variables
               $edu = @$_POST['edu'];
               $work = @$_POST['work']; 

               //update the database with any changes
               $sql = mysqli_query($con,"UPDATE users SET education='$edu' WHERE email='". $uname1 ."'");   
               $sql2 = mysqli_query($con,"UPDATE users SET experience='$work' WHERE email='". $uname1 ."'");
                //run the query to actually add the changes
                $retval = mysqli_query($con, $sql);
                $retval2 = mysqli_query($con, $sql2);
                mysqli_close($con);


            }

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
        <h3>Change Password</h3>
        <h5>To change your password<br>Type your new password into both fields.<br></h5>
        <form method="post" action="settings.php">
            Email: <input type="email" name="email"><br><br>
            Password: <input type="password" name="password"><br><br>
            Password again: <input type="password" name="password1"><br><br>
            <input type="submit" name="submit1" value="submit">
        </form>
    </div>
    <!--The img class is the class that defines the properties of the user image-->
	<img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
     

<div Class="uploadpic">
<h3>Change Profile Picture</h3><br>
        <form id="uploadfile" action="pic.php" method="post"
        enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="uploadpic" id="file">
		<input type="submit" value="upload"/></form>
		</div>


<div Class="prof">
     <h3>Edit Profile</h3>
        <form method="post" action="settings.php">
        Education:<br>
        <div class="txt"><textarea name="edu" COLS="75" ROWS="15" id="edu"><?php echo $row['education'] ?></textarea><br></div>
        Professional Experience: <br>
        <div class="txt"><textarea name="work" COLS="75" ROWS="15" id="work"><?php echo $row['experience'] ?></textarea></div>
        <p><input type="submit" name="submit" value="Save" id="submit"style="float:left;"></p></form>
        <form method="post" action="settings.php">
        <p><input type="submit" name="back" value="Refresh" id="back" style="float:right;"></p></form>
         </div>

    </body>
</html>
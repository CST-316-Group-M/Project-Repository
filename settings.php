<!doctype html>
<?php
session_start();
$uname = $_SESSION['email'];
$fname = $_SESSION['fname'];
$arr = explode("@", $uname);			//php explode function splits strings
$uname= $arr[0];


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
        header('Location: success.php');
    }
    else{
    echo "passwords do not match!";
    }
}
mysqli_close($con);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Management</title>
        <link rel="stylesheet" type="text/css" href="style_main.css">
        <link rel="stylesheet" type="text/css" href="template_main.css">
        <link rel="stylesheet" href="./style.css">
        <script src="./.sorttable.js"></script>
    </head>
    <body>
		
        <div class="container1">
        <div class="username"><h1></h1></div>
	<div class="sboxed"></div>
        <div class="hboxed"><h1>Group M Project Management</h1></div>
        <div class="hboxed2"> </div>
        <div class="navbar">
            <ul>
		<div class="barcontainer">
                <div class="bar"><a href="index_main.php">Home</a></div> 
                <div class="bar"><a href="#">Directory</a></div>
                <div class="bar"><a href="settings.php">Settings</a></div> 
                <div class="bar"><a href="index_profile.php">Profile</a></div>
                <div class="bar"><a href="logout.php">Log Out</a></div>
		</div>
            </ul>
		
        </div>
        <div class="passwd">
        <form method="post" action="resetpass.php">
        <p>Email: <input type="email" name="email"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>Password again: <input type="password" name="password1"></p>
        <p><input type="submit" name="submit1" value="submit"></p>
        </form>
    </div>
	<img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
        
    </body>
</html>
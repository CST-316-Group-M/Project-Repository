<?php
session_start();
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="CST316groupm"; // Mysql password 
$db_name="Testusers"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (I think)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword
if($count==1){
session_register("myusername");
header("location:mainhub.php");
exit();
}
else {
header("location:failed.php");
}
ob_end_flush();
?>
<?php
$host="localhost"; // Host name 
$email=""; // Mysql email 
$password=""; // Mysql password 
$db_name="test"; // Database name 
$tbl_name="members"; // Table name 

// Connect to the server and select databse.
mysql_connect("$host", "$email", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

//the email and password sent from login form 
$myemail=$_POST['myemail']; 
$mypassword=$_POST['mypassword']; 

// To help protect against MySQL injection
$myemail = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myemail = mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE email='$myemail' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If password and email result matched ($myemail and $mypassword), table row must be 1
if($count==1){

// Register $myemail, $mypassword and redirect to mainhub
session_register("myemail");
session_register("mypassword"); 
header("location:mainhub.html");
}
else {
echo "Wrong email or Password";
}
?>
<?php
session_start();
$email = $_SESSION['email'];
echo "GOD DAMMIT";

	$con=mysqli_connect("localhost","webauth","webauth","CST316");  //PHP doesn't like using $db for some reason - Jason
	$query = "SELECT fname FROM users WHERE email = '".$email."'";
	$result1 = mysqli_query($con, $query);
	$fetchy = mysqli_fetch_row($result1);
	$name = $fetchy[0];
	$_SESSION['fname'] = $name;
	echo $name;
 
 
 ?>
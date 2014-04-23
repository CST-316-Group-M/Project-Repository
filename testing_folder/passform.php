<?php
session_start();
$email = ($_SESSION['email']);
$token = openssl_random_pseudo_bytes(40, $cstrong);
$con=mysqli_connect("localhost","webauth","webauth","CST316");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = "SELECT email FROM users WHERE email = '".$email."'";
$sql = mysqli_query($con, $query) or die(mysqli_error());  
$rownum = mysqli_num_rows($sql);
if(!$rownum) {
   echo "Email recovery has been sent";
	}
else{
	$to = $email;
	$subject = "Password Recovery";
	$message = "Hello! Someone has submitted a forgotten password attempt for your account. Please click on the link here to reset your password: http://cst316m.no-ip.org/testing_folder/resetpass.php";
	$from = "service@GroupM.DrGary";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	echo "Email recovery has been sent";
	}
mysqli_close($con);
session_destroy();
?>

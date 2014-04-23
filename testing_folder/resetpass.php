
<?php
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
		header('Location: resetpass2.php');
	}
	else{
	echo "passwords do not match!";
	}
}
mysqli_close($con);
?>
<html>
<form method="post" action="resetpass.php">
		<p>Email: <input type="email" name="email"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Password again: <input type="password" name="password1"></p>
		<p><input type="submit" name="submit1" value="submit"></p>
</form>
</html>
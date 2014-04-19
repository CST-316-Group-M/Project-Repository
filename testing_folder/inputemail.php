
<?php
session_start();
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$_SESSION['email']=$email;
	header('Location: new2.php');
	return false;
}
?>
<html>
<form method="post" action="inputemail.php">
		<p>Email: <input type="email" name="email"></p>
		<p><input type="submit" name="submit" value="submit"></p> </form>
</html>
<html>
	<body>
	<?php
	if(empty($_POST['fname']))
	{echo "First name is blank!";}
	if(empty($_POST['lname']))
	{echo "Last name is blank!";}
	if(empty($_POST['email']))
	{echo "eamil is blank!";}
	if(empty($_POST['password']))
	{echo "password is blank!";}
	
	
	
	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['lname']) && !empty($_POST['lname']) 
	&& isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
	{
		$db = connect('root','CST316groupm');
		if($db!=false)
		{
			register($db);
			header('Location: /success.php');
		}
	}
	
	function connect($dbuser,$dbpassword)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=CST316','root','CST316groupm');
			return $db;
		}
		catch(PODException $e)
		{
			echo $e;
			return false;
		}		
	}
	
	function register($db)
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = sha1($_POST['password']);

		$query = "INSERT INTO users(fname,lname,email,password) values('".$fname."','".$lname."','".$email."','".$password."')";
		try
		{
			$db->beginTransaction();
			$db->exec($query);
			$db->commit();
		}
		catch(Exception $e){}
	}
	
	?>
	
	<!DOCTYPE html>
	<html>
		<h1>Almost There!</h1>
		<b>We just need some information from you.</b>
		<form method="post" action="registration.php">
		<p>First Name: <input type="text" name="fname"></p>
		<p>Last Name: <input type="text" name="lname"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Email: <input type="email" name="email"></p>
		<p><input type="submit" name="submit" value="Register"></p>
		
		

	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- ACCOUNT DUPLICATES
	- FILTER INPUT
	
	-->
	</body>
</html>
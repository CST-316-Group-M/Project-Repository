<html>
	<body>
	<?php
	
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']))
	{
		$db = connect('jake','drag7388');
		if($db!=false)
		{
			register($db);
			echo "User Registered";
		}
	}
	
	function connect($dbuser,$dbpassword)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=my_db','jake','drag7388');
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
		$fname = mysql_real_escape_string($_POST['fname']);
		$lname = mysql_real_escape_string($_POST['lname']);
		$email = mysql_real_escape_string($_POST['email']);
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
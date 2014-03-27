<html>
	<body>
	<?php
	
	//Original file work is by Jake
	//next lines added by Jason
	//$host="localhost"; // Host name 
	//$username="root"; // Mysql username 
	//$password="CST316groupm"; // Mysql password 
	//$db_name="CST316"; // Database name 
	//$tbl_name="Users"; // Table name 
	
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
	// Connect to server and select database.
		$db = connect('root','CST316group');
		if($db!=false)
		{
			register($db);
			echo "User Registered";
		}
		else 
		{
			echo "Broken!"; 
			}
	}

	function connect($username,$pass)
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
		$fname1 = mysql_real_escape_string($_POST[fname]);
		$lname1 = mysql_real_escape_string($_POST[lname]);
		$password1 = sha1($_POST['password']);
		$email1 = mysql_real_escape_string($_POST[email]);
		

		$query = "INSERT INTO Users(first,last,password,email) VALUES ('$_POST[fname]','$_POST[lname]','$password1','$email1')";
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
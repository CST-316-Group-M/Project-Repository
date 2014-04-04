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
		
		$query = "SELECT * FROM users WHERE email = '".$email."'";
		$dup = mysql_query($db, $query);
		//$dup = mysql_query("SELECT username FROM users WHERE username='".$_POST['username']."'");
		if (!$dup) {
				$query2 = "INSERT INTO users(fname,lname,email,password) values('".$fname."','".$lname."','".$email."','".$password."')";
				try
				{
					$db->beginTransaction();
					$db->exec($query2);
					$db->commit();
				}
				catch(Exception $e){}
				
				$result = mysql_query($db, $query2);
					
					if (!$result) {
						echo "Registration Failed.";
						return false;
					}
					else {
						echo "You've Successfully Registered!";
						return true;	
					}
				}
			else {
				//header('Location: /failed.php');
				echo "Cannot register; account already exists.";
				return false;				
			}

		/*try
		{
			$db->beginTransaction();
			$db->exec($query);
			$db->exec($query2);
			$db->commit();
		}
		catch(Exception $e){}
		*/
	}
	
	?>
	
	<!DOCTYPE html>
	<html>
	<style>
				.logo  { position:relative; width:600px; height:50px; top:115px; margin-left:auto; margin-right:auto; }
				.login { position:relative; width:800px; height:325px; top:100px; margin-left:auto; margin-right:auto; }
				.table { position:relative; top:0px; left:0px; bottom:0px; right:0px; align:left;}
				.login { border:3px solid #a1a1a1;  width:400px; border-radius:10px; padding: 10px 10px; 
				background-image:url('./img/box.jpg');}
				td {height:10px; }
				table {background:transparent;}
				body { background-image:url('./img/wallpaper.jpg'); }	
			</style>
		<div class="login">
		<center>
		<h1>Almost There!</h1>
		<b>We just need some information from you.</b>
		<form method="post" action="registration.php">
		<p>First Name: <input type="text" name="fname"></p>
		<p>Last Name: <input type="text" name="lname"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Email: <input type="email" name="email"></p>


		<p><input type="submit" name="submit" value="Register"></p>
		</div>
		

	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- ACCOUNT DUPLICATES
	- FILTER INPUT
	
	-->
	</body>
</html>
<html>
	<body>
<style>
			body { background-image:url('./img/wallpaper.jpg'); }	
		</style>
	<?php
	session_start();
	if(!isset($_POST['fname'])) {
		$fname = $_POST['fname']; }
		
	if(!isset($_POST['lname'])) {
		$lname = $_POST['lname'];}
	
	if(!isset($_POST['email']))	{
		$email = $_POST['email']; }
	
	if(!isset($_POST['password'])) {
		$password = sha1($_POST['password']); }
	
	
	
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
						//$arr = explode("@", $email);			//php explode function splits strings
						//$parsedusername = $arr[0];			//storing split string in new var
						$_SESSION['email'] = $email; 	 		//creating/checking session variable/change to parsedusername later						
						echo "You've Successfully Registered!";
						mkdir("/var/www/users/$email/", 0777); //permissions for rwx
						header('Location: /success.php');
						return false;
					}
					else {
						echo "Registration Failed.";
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
		<h1>Almost There!</h1>
		<b>We just need some information from you.</b>
		<form method="post" action="registration.php">
		<p>First Name: <input type="text" name="fname"></p>
		<p>Last Name: <input type="text" name="lname"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Email: <input type="email" name="email"></p>
		<p><input type="submit" name="submit" value="Register"></p>
		
	
	</body>
</html>

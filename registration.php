<<<<<<< HEAD
<!--
Original Author: Jacob/Lauren
Contributors: Jason
Description: inserts new user into users table in database

TODO: Apply functions to all PHP code
-->
<html>
	<body>
	<?php
	session_start();
	if(empty($_POST['fname']))
	{echo "";}
	if(empty($_POST['lname']))
	{echo "";}
	if(empty($_POST['email']))
	{echo "";}
	if(empty($_POST['password']))
	{echo "";}
=======
<html>
	<body>
	<?php
<<<<<<< HEAD
	session_start();
=======
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
	if(empty($_POST['fname']))
	{echo "First name is blank!";}
	if(empty($_POST['lname']))
	{echo "Last name is blank!";}
	if(empty($_POST['email']))
	{echo "eamil is blank!";}
	if(empty($_POST['password']))
	{echo "password is blank!";}
>>>>>>> master
	
	
	
	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['lname']) && !empty($_POST['lname']) 
	&& isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
	{
<<<<<<< HEAD
		$db = connect('webauth','webauth');
=======
		$db = connect('root','CST316groupm');
>>>>>>> master
		if($db!=false)
		{
				register($db);
			
		}
	}
<<<<<<< HEAD
	function creation($user, $con){
		//This function creates the necessary directories, adds to the default group, makes a default picture display,
		mkdir("/var/www/users/$user/", 0777); //permissions for rwx
		mkdir("/var/www/users/$user/.set/", 0777);
		mkdir("/var/www/users/$user/.old/", 0777);
		mkdir("/var/www/users/$user/Public Folder", 0777);
		copy ("/var/www/user_picture/default.png", "/var/www/users/$user/.set/$user.png"); //courtesy of http://findicons.com/ (OpenGL license)
		}
=======
	
>>>>>>> master
	function connect($dbuser,$dbpassword)
	{
		try
		{
<<<<<<< HEAD
			$db = new PDO('mysql:host=localhost;dbname=CST316','webauth','webauth');
=======
			$db = new PDO('mysql:host=localhost;dbname=CST316','root','CST316groupm');
>>>>>>> master
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
<<<<<<< HEAD
		$_SESSION['email']=$email;
		$password = sha1($_POST['password']);
		$con=mysqli_connect("localhost","webauth","webauth","CST316");  //PHP doesn't like using $db for some reason - Jason
		$query = "SELECT * FROM users WHERE email = '".$email."'";
		$dup = mysqli_query($con, $query);
		$dup_rows = mysqli_fetch_row($dup);
	
		if ($dup_rows) {
				header('Location: /failed.php');
				return false;
				}
		else {
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
					$arr = explode("@", $email);			//php explode function splits strings
					$user = $arr[0];			//storing split string in new var
					$_SESSION['user'] = $user; 	 		//creating/checking session variable/change to parsedusername later						
					$_SESSION['name'] = $fname;
					creation($user,$con);
					header('Location: /success.php');
					return true;
					}
				else {
						
					echo "Registration Failed.";
					return false;
					}				
			}
=======
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
<<<<<<< HEAD
						$arr = explode("@", $email);					//php explode function splits strings
						$parsedusername = $arr[0];						//storing split string in new var
						$_SESSION['parsedusername'] = $parsedusername; 	//creating/checking session variable						
						echo "You've Successfully Registered!";
						mkdir("/var/www/users/$parsedusername/", 0777); //permissions for rwx
=======
						echo "You've Successfully Registered!";
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
						return true;	
					}
				}
			else {
				//header('Location: /failed.php');
				echo "Cannot register; account already exists.";
				return false;				
			}

>>>>>>> master
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
<<<<<<< HEAD
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
=======
>>>>>>> master
		<h1>Almost There!</h1>
		<b>We just need some information from you.</b>
		<form method="post" action="registration.php">
		<p>First Name: <input type="text" name="fname"></p>
		<p>Last Name: <input type="text" name="lname"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Email: <input type="email" name="email"></p>
<<<<<<< HEAD


		<p><input type="submit" name="submit" value="Register"></p>
		</div>

</style>
=======
		<p><input type="submit" name="submit" value="Register"></p>
		
<<<<<<< HEAD
	
=======
		

	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- ACCOUNT DUPLICATES
	- FILTER INPUT
	
	-->
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
>>>>>>> master
	</body>
</html>
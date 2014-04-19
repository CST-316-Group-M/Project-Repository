<!--
Original Author: Jacob/Lauren
Contributors: Jason
Description: inserts new user into users table in database

TODO: Apply functions to all PHP code
-->
<html>
	<body>
	<?php
<<<<<<< HEAD
<<<<<<< HEAD
	session_start();
=======
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
=======
	session_start();
>>>>>>> 56772acc2080ddafb5796a7ac4542cb800b1700a
	if(empty($_POST['fname']))
	{echo "";}
	if(empty($_POST['lname']))
	{echo "";}
	if(empty($_POST['email']))
	{echo "";}
	if(empty($_POST['password']))
	{echo "";}
	
	
	
	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['lname']) && !empty($_POST['lname']) 
	&& isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
	{
		$db = connect('webauth','webauth');
		if($db!=false)
		{
				register($db);
			
		}
	}
	function creation($user, $con){
		//This function creates the necessary directories, adds to the default group, makes a default picture display,
		mkdir("/var/www/users/$user/", 0777); //permissions for rwx
		mkdir("/var/www/users/$user/.set/", 0777);
		mkdir("/var/www/users/$user/.old/", 0777);
		copy ("/var/www/user_picture/default.png", "/var/www/users/$user/.set/$user.png"); //courtesy of http://findicons.com/ (OpenGL license)
		}
	function connect($dbuser,$dbpassword)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=CST316','webauth','webauth');
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
<<<<<<< HEAD
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
=======
				else {
						
					echo "Registration Failed.";
					return false;
					}				
>>>>>>> 56772acc2080ddafb5796a7ac4542cb800b1700a
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
<<<<<<< HEAD
		
<<<<<<< HEAD
	
=======
		

	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- ACCOUNT DUPLICATES
	- FILTER INPUT
	
	-->
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
=======
		</div>

</style>
>>>>>>> 56772acc2080ddafb5796a7ac4542cb800b1700a
	</body>
</html>
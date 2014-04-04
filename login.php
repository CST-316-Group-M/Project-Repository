<?php
session_start();

if(isset($_SESSION['email']))
{
	//echo "Welcome, you are logged in";
}

if(isset($_POST['email']) && isset($_POST['password']))
{
	$email = $_POST['email'];
	$pass = sha1($_POST['password']);
	
	$db = connect('root', "CST316groupm");
	$eval = validate($db, $email, $pass);
	
	if($eval != false)
	{
		echo "Welcome ".$eval;
		$_SESSION['user']=$eval;
		header("location: ./Mainhub_Dir/.index.php");
	}
}

	function connect($dbemail,$dbpassword)
	{
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=CST316',$dbemail, $dbpassword);
			return $db;
		}
		catch(PODException $e)
		{
			echo $e;
			return false;
		}		
	}

	function validate($db, $email, $pass)
	{
		$myemail = false; 
		$query = "SELECT email, password FROM users where email = '".$email."' AND password = '".$pass."'";
		try
		{
			$db->beginTransaction();
			$result = $db->query($query);
			
			foreach($result as $row)
			{
				$myemail = $row['email'];
				
			}
			
			$db->commit();
			return $myemail;
		}
		catch(Exception $e){}
	}


?>









<!DOCTYPE html>
<html>
	<!-- CSS inline sheet in the head tag. -->
	<head>
		<body>
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
	</head> 

	</script>
	<h1 class="logo"><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Simplest Way To Stay Up To Date.</i></h1>
		
		<form action="login.php" method = "post"><!-- This is the PHP file its calling when the user hits the login button -->
		
		<div class="login">
		<center>
		<div class="table">		
			<table>
				<tr>				
						<h2><i><b>Welcome Back!</b></i></h2>			
				</tr>
				<tr>
					<td align="right" width="100px">
						<p><b>Email:</b></p>
					</td>
					<td width="200px">
					<form name="login">&nbsp;<input name="email" type="text" id="email"></td>
					<td width="60px"></td>
				</tr>
				<tr>
					<td align="right">
					<p><b>Password:</b></p></td>
					<td>&nbsp;<input name="password" type="password" id="password"></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="center">
					<input type="submit" name="Submit" value="Login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></form>
					<td></td>
				</tr>
				</form>
				<tr>
					<td></td>
					<td align="left">&nbsp;&nbsp;&nbsp;<a href="#forgotpass">Forgot your password?</a></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td align="left">
					<a href="registration.php">Need to create an account?</a></td>
					<td></td>
				</tr>
			</table>
			</div>
			</center>
		</div>
	
	</body>
</html>

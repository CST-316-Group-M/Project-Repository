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


	<script language="javascript">
	<!--//
/*This Script allows people to enter by using a form that asks for a
UserID and Password*/
	function pasuser(form) {
		if (form.id.value=="JavaScript") { 
			if (form.pass.value=="Kit") {              
				location="mainhub.html" 
			} else {
				alert("Invalid Credentials")
				location="mainhub.html"
			}
		} else {  alert("Invalid Credentials")
	}
}
	//-->
	<?php 
	$email = $_POST['email'];
	$password = $_POST['password'];	 
	if((!isset($email)) || (!isset($password))) { //if the email or password is not set then it requires login info
	?>
	</script>
	<h1 class="logo"><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Simplest Way To Stay Up To Date.</i></h1>
		
		<form name="form1" method="post" action="checklogin.php"><!-- This is the PHP file its calling when the user hits the login button -->
		
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
					<form name="login">&nbsp;<input name="myemail" type="text" id="myemail"></td>
					<td width="60px"></td>
				</tr>
				<tr>
					<td align="right">
					<p><b>Password:</b></p></td>
					<td>&nbsp;<input name="mypassword" type="text" id="mypassword"></td>
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
		<?php
			} else {   
				//connect to database 
				$con = mysqli_connect("localhost","webauth","webauth");

				//select the database 
				$sel = mysqli_select_db($con, 'auth');

				//query for correct user + password combo
				$query = "SELECT * FROM users WHERE email = '".$email."' and password = '".$password."'";
				
				//running query
				$result = mysqli_query($con, $query);		 		
			 
	 			$row = mysqli_fetch_row($result);
				$count = $row[0];

				if ($count == 0) {
					echo "You did it!";
				}
				else {
					echo "Authentication failed.";
				}
				 
			}
		?>	
	</body>
</html>

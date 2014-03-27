<title>CST 316 Bitches!</title>
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


	<?php 
			session_start();
			
			if(isset($_POST)) {
				if(isset($_POST['email'])) {
					$email = $_POST['email'];
				}
				if(isset($_POST['password'])) {
					$password = $_POST['password'];
				}
			}
			
			
			if((!isset($email)) || (!isset($password))) { //if the username or password is not set then it requires login info
		?>
			<h1>Log In</h1>
			<form method="post" action="login.php">
			<p>Username: <input type="text" name="email"></p>
			<p>Password: <input type="password" name="password"></p>
			<p><input type="submit" name="submit" value="Log In"></p>
			</form>
			
		<?php
			} else {   
				
				//connect to database 
				$con = mysqli_connect("localhost","webauth","webauth");
					if(!$con) {
						echo "Could not connect to database.";
						}
				//select the database 
				$sel = mysqli_select_db($con, 'CST316');
					if(!$sel) {
						echo "Could not select database.";
						}
				
				//query for correct user + password combo
				$query = "SELECT * FROM Users WHERE email = '".$email."' and password = '".$password."'";
				
				//running query
				$result = mysqli_query($con, $query);		 		
 				
				while($row = mysqli_fetch_assoc($result));	
						{
							echo "Why won't you work?!";
							if(!$row) {
							echo "gosh diddly darn dangit.";
							}
						}
	 			$row = mysqli_num_rows($result);
				
				
				/***
				Counts the number of rows from the query, should have exactly one match to authenticate.
				session starts at the top of the file, session variables are set ONLY if there is a user
				match/successful authentication. Header will then redirect to the mainhub page with an 
				active session.
				***/
				if ($row == 1) {
				/*
					while($getname = mysqli_fetch_assoc($result));	
						{
							echo "Why won't you work?!";
							echo $getname["first"];
							//echo $name;
							//$_SESSION['name'] = $name;
							//echo $_SESSION['name'];
						}
					*/
					$_SESSION['email'] = $email;						// session variable is set to the authenticated user
					//header('Location: /mainhub.php');		// CHANGE THIS FOR THE SERVER
					
					
				}
				else {
					echo "Username or password incorrect; could not log in.";
				}
				
				 
			}
						
		?>	
	</body>
</html>
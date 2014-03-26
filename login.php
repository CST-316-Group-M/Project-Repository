<html>
	<body>
	
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
 					
	 			$row = mysqli_num_rows($result);
				
				
				/***
				Counts the number of rows from the query, should have exactly one match to authenticate.
				session starts at the top of the file, session variables are set ONLY if there is a user
				match/successful authentication. Header will then redirect to the mainhub page with an 
				active session.
				***/
				if ($row == 1) {	
							
					$_SESSION['email'] = $email;						// session variable is set to the authenticated user
					header('Location: /mainhub.php');		// CHANGE THIS FOR THE SERVER
					
					
				}
				else {
					echo "Username or password incorrect; could not log in.";
				}
				
				 
			}
						
		?>	
		</body>
</html>
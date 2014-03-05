<html>
	<body>
 	<?php 
			$email = $_POST['email'];
			$password = $_POST['password'];	 
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

				//select the database 
				$sel = mysqli_select_db($con, 'auth');

				//query for correct user + password combo
				$query = "SELECT * FROM users WHERE email = '".$email."' and password = '".$password."'";
				
				//running query
				$result = mysqli_query($con, $query);		 		
/* 					if (!$result) {
						echo "<p>Could not run query. </p>";
						exit;
						}
					else {
						echo "<p>Query Successful!</p>";
						exit;
					} */
			 
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
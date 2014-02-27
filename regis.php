<html>
	<body>
 	<?php 
	
			$name = $_POST['name'];
			$password = $_POST['password'];	
			
			if((!isset($name)) || (!isset($password))) { //if the username or password is not set then it requires login info
				
				
		?>
			<h1>Log In</h1>
			<form method="post" action="regis.php">
			<p>Username: <input type="text" name="name"></p>
			<p>Password: <input type="Password" name="Password"></p>
			<p><input type="submit" name="submit" value="Log In"></p>
			</form>
		
		<?php
			} else {  
			
													 
				
				//connect to database 
				$con = mysqli_connect("localhost","webauth","webauth");		// webauth is sql's username and password to access the table,
					if (!$con) {											// only has permission to run a select query to match their username
						echo "Could not connect. ";
						exit;
					}
					else {
						echo "Connected Successfully!";
						exit;
					}
						
				//select the database 
				$sel = mysqli_select_db($con, "auth");
					if (!$sel) {
						echo "Could not select a database. ";
						exit;
					}
				
				//query for correct user + password combo
				$query = "select count(*) from auth where firstname = '".$name."' and password = '".$password."'";
					
				$result = mysqli_query($con, $query);
					if (!$result) {
						echo "Could not run query. ";
						exit;
						}
					else {
						echo "Query Successful!";
						exit;
					}
			}
		?>	
		</body>
</html>

<html>
	<body>
	<?php
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if((!isset($name)) || (!isset($password))) {
	?>
		<h1>Almost There!</h1>
		<b>We just need some information from you.</b>
		<form method="post" action="registration.php">
		<p>Name: <input type="text" name="name"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Email: <input type="email" name="email"></p>
		<p><input type="submit" name="submit" value="Register"></p>
	
	<?php
	} else {
		//connect to database 
				$con = mysqli_connect("localhost","webauth","webauth");		// webauth is a mysql username and password to access the table,
					/*														// only has permission to run select query
					if (!$con) {											
						echo "Could not connect. ";
						exit;
					}
					else {
						echo "Connected Successfully!";
						exit;
					}
					*/
						
				//select the database 
				$sel = mysqli_select_db($con, "auth");
					/*
					if (!$sel) {
						echo "Could not select a database. ";
						exit;
					}
					else {
						echo "Database selected successfully!";
					}
					*/

				$query = "insert into users(firstname, password, email) values('".$name."', '".$password."', '".$email."')";
				
				$result = mysqli_query($con, $query);
					/*
					if (!$result) {
						echo "Could not run query. ";
						exit;
						}
					else {
						echo "Query Successful!";
						exit;
					}
					*/
		}
	?>
	<h1>You've Successfully Registered!</h1>
	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- ACCOUNT DUPLICATES
	- FILTER INPUT
	
	-->
	</body>
</html>
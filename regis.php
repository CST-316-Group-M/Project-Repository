<html>
	<body>
	<?php
/*
		//
			$name = $_POST['name'];
			$password = $_POST['password'];	
			if((!isset($name)) || (!isset($password))) { //if the username or password is not set then it requires login info
		
		?>
			<h1>Log In</h1>
			<form method="post" action="regis.php">
			<p>Username: <input type="text" name="name"></p>
			<p>Password: <input type="Password" name="Password"></p>
		
		<?php
			} else { 	*/									 
				//connect to database 
				$con = mysqli_connect("localhost","lauren","password");		// webauth is sql's username and password to access the table,
					if (!$con) {											// only has permission to run a select query to match their username
						echo "Could not connect. ";
						exit;
					}
					else {
						echo "Connected Successfully!";
					}
		/*				
				//select the database and the table
				$sel = mysqli_select_db($con);
					if (!$sel) {
						die("Could not select: " . mysql_error());
				}
				
				//table creation - THIS AND THE DATABASE CREATION WILL BE IN AN SQL FILE
				$auth = mysqli_query("CREATE TABLE auth(fn varchar(20), pw varchar(16), primary key (name))");
				
				$ins = mysqli_query("insert into auth('user', 'password')");
					if (!$ins) {
						echo "Could not insert";
						exit;
					}
				
				
				
				//query for correct user + password combo
				$query = mysqli_query("select from auth where fn = '".$name."' and pw = '".$password."'");
				
					
			
			// and password for the website
			//- search authentication table for appropriate info
			//- allow access to account resources
			//	}
			*/
		?>	
		</body>
</html>

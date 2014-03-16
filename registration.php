<html>
	<body>
	<?php
	class Registration {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];	
		
		
		function form() {			
			if((!isset($fname)) || (!isset($lname)) || (!isset($password)) || (!isset($email))) {
	?>
		<h1>Almost There!</h1>
		<b>We just need some information from you.</b>
		<form method="post" action="registration.php">
		<p>First Name: <input type="text" name="fname"></p>
		<p>Last Name: <input type="text" name="lname"></p>
		<p>Password: <input type="password" name="password"></p>
		<p>Email: <input type="email" name="email"></p>
		<p><input type="submit" name="submit" value="Register"></p>
	
	<?php
		} else {
				//connect to database 
				$con = mysqli_connect("localhost","new","new");		// query not working? - double check sql perms
						
				//select the database 
				$sel = mysqli_select_db($con, "auth");

			}
		}
		function czechAccount() {		//functions that is czeching the account for duplicates first		
			$query = "select * from users where email = '".$email."'";
			$dup = mysqli_query($con, $query);
			if (!$dup) {
				echo "Cannot register; account already exists.";
			}
			else {
				$query = "insert into users(first, last, password, email) values('".$fname."', '".$lname."', '".$password."', '".$email."')";
				$result = mysqli_query($con, $query);
					if (!$result) {
						echo "Registration Failed.";
						exit;
						}
					else {
						echo "You've Successfully Registered!";
						exit;
					}	
			}
		}
	}
	
	$regi = new Registration();
	$regi->form();
	?>
	
	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- FILTER INPUT (VALIDATE EMAIL, ETC)
	
	-->
	</body>
</html>
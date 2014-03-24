<html>
	<body>
		<?php	
			require_once "databaseClass.php";	
			
			$fname = $_POST['fname'];						
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			class Registration extends MyDatabase {				//check if we have to extend if using require_once
				
					
				
				
				function form() {			
					if((!isset($this->fname)) || (!isset($this->lname)) || (!isset($this->password)) || (!isset($this->email))) {
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
						echo "variables are set.";
					}
				}
				
			}
			
			//creating an instance of Registration
			$regi = new Registration();
			$regi->connectDB();
			$regi->form();
			
			?>
	
	<!-- 
	KNOWN ISSUES/NEEDED FEATURES
	- FILTER INPUT (VALIDATE EMAIL, ETC)
	-->
	</body>
</html>
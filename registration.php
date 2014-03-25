<html>
	<body>
		<?php	
		
			if(isset($_POST)) {
				if(isset($_POST['fname'])) {
					$fname = $_POST['fname'];
				}
				if(isset($_POST['lname'])) {
					$lname = $_POST['lname'];
				}
				if(isset($_POST['email'])) {
					$email = $_POST['email'];
				}
				if(isset($_POST['password'])) {
					$password = $_POST['password'];
				}
			}
			/*
			$fname = $_POST['fname'];						
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			*/
			require_once "databaseClass.php";	
					
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
			$regi->selectDB();
			$regi->form();
			//$regi->saysomething();
			$regi->addAccount();
			
			?>
	
	<!-- 
	KNOWN ISSUES/NEEDED FEATURES
	- FILTER INPUT (VALIDATE EMAIL, ETC)
	-->
	</body>
</html>
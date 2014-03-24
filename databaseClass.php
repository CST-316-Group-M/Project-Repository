<?php

	class MyDatabase {					
		
		private $host = "localhost";
		private $user = "webauth";
		private $pass = "webauth";
		
		//connect to database
		public function connectDB() { 
				$con = mysqli_connect($this->host,$this->user,$this->pass);		// query not working? - double check sql perms
						if(!$con) {											 
							echo "Error: could not connect to database.";
							}
						else {
							echo "Connected Successfully!";
						}
		}
		
		//select database
		public function selectDB() {
				$sel = mysqli_select_db($con, "auth");
					if(!$con) {
							echo "Error: could not select database.";
							}
					else {
							echo "Selected Successfully!";
						}
		}
		
		/*
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
						return false;
						}
					else {
						echo "You've Successfully Registered!";
						return true;					}	
			}
		} */
	}
	
	/*
	
	Need to add query to register a user and to select a user for login
	
	*/
	
	?>
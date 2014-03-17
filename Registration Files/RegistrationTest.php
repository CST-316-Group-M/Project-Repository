<?php 
	
	require_once "databaseClass.php";
	
	class RegistrationTest extends PHPUnit_Framework_TestCase {
		
			
		public function formTest() {
			// if possible - should not be, function will
			// wait for values, but check entered values - null
		}
		
		//clean then populate table
		
		public function czechAccountTest() {
			$reg = new Registration();
			$reg->connectDB();
			//$reg->selectDB();
			
			// run duplicate query
			for (int x = 0; x < 2; x++) {
				$query = "insert into users(first) values('lauren')";
				$result = mysqli_query($con, $query);
				if (!$result) {
					echo "query failed.";
					exit;
					}
				else {
					echo "query successful";
					exit;
						}
					}
			assertFalse(reg->czechAccount());
			
			// run non duplicate query
			$query = "insert into users(first) values('lauren')";
			$result = mysqli_query($con, $query);
			if (!$result) {
				echo "query failed.";
				exit;
				}
			else {
				echo "query successful";
				exit;
				}
			assertTrue(reg->czechAccount());
		}
		 
	}
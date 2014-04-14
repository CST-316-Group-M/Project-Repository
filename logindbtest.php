/*
Original Author: Lauren Krugen
Contributing Author(s):

- PHPUnit DBunit test file for login.php. 
*/

<?php
	
	class LoginDBTest extends PHPUnit_Extensions_Database_TestCase {
	
		public $pdo;
		
		function getPDO() {
			try {
			$this->pdo = new PDO('mysql:localhost;dbname=test', 'testuser', 'testpassword');
			}
			catch (PDOException $e) {
				echo $e->getMessage();
				die();
			}
		}
		
		function getConnection() {	//this must return object
			return createDefaultDBConnection($this->pdo, dbname);
		}
		
		function getDataSet() {
		
		}
	}

?>
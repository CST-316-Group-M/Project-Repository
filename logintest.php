/*
Original Author: Lauren Krugen
Contributing Author(s):

- PHPUnit test file for login.php. 
*/

<?php
	session_start();
	//require once "login.php";

class LoginTest extends PHPUnit_Framework_TestCase {
	
	
	
	public function testSession() {
		$email = 'zeblehblehbleh@gmail.com';
		$_SESSION['email'] = $email;
		//$_SESSION = array();
		//session_destroy();
		$this->assertEmpty($_SESSION['email']);
	}

	public function testPost() {

	}

	public function testConnect() {
		
	}

	public function testValidate() {

	}
	
	
	
}

?>
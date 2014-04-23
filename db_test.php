/*
Original Author: Jordan Smith
Contributing Author(s):

- PHPUnit test file for login.php. 
*/

<?php


<<<<<<< HEAD
class db_test extends PHPUnit_Framework_TestCase
{
=======
class db_test extends PHPUnit_Framework_TestCase {
>>>>>>> master


	private function pretty_filesize($size) 
	{		
		$size = "8590000000";
	    if ($size < 1024) {
	        $size = $size . " Bytes";
	    } elseif (($size < 1048576) && ($size > 1023)) {
	        $size = round($size / 1024, 1) . " KB";
	    } elseif (($size < 1073741824) && ($size > 1048575)) {
	        $size = round($size / 1048576, 1) . " MB";
	    } else {
	        $size = round($size / 1073741824, 1) . " GB";
	    }
	    return $size;
	}
	public function testEmail() 
	{
		$email = 'zeblehblehbleh@gmail.com';
		$_SESSION['email'] = $email;
		$this->assertNotEmpty($_SESSION['email']);
		$this->assertEquals($_SESSION['email'],'zeblehblehbleh@gmail.com');
	}

	/*public function testfile_size() 
	{
		pretty_filesize();
		$this->assertEquals($size,'8');
	}*/
	public function testUname() 
	{
		$email = 'jtsmit9421@gmail.com';
		$arr = explode("@", $email);
		$uname= $arr[0];
		$this->assertEquals($uname,'jtsmit9421');
	}

	public function testcurrdir() 
	{
		$email = 'jtsmit9421@gmail.com';
		$arr = explode("@", $email);
		$uname= $arr[0];
		$currdir = "./users/$uname";
		$this->assertEquals($currdir,'./users/jtsmit9421');
<<<<<<< HEAD
		
	}


}
=======

	}



}

>>>>>>> master
?>
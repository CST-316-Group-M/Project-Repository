
<html>
<body>
<?php
	/*
	Class 'Upload' with function(s) that check the file size/type/
	*/
	class Upload {
	
		public function fileCheck() {
			$sizeLimit = 5000;
			if ($_FILES["file"]["error"] > 0)
				{
				echo "Error uploading: " . $_FILES["file"]["error"];
				}
			elseif ($_FILES["file"]["size"] > $sizeLimit)	
				{
				echo "Error uploading: File size too large. " . $_FILES["file"]["size"];
				}
			else
				{
				echo "'" . $_FILES["file"]["name"] . "'" . " Uploaded Successfully!";
				//echo "Temp location of the file: " . $_FILES["file"]["tmp_name"];
				move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
				}
			}
	}
	
	class UploadTest extends PHPUnit {
		public function fileCheckTest() {
			$this->assertFileExists('C:/Docs/test.txt');
		}
	}
	// still working on setting up phpunit 
	
	$userFile = new Upload();
	$userFile->fileCheck();
	

/*
Configuration for the server:
WAMP version 2.4
this file will be the configuration for the main file system. Users will have
access to directories which will act as their repositories. Notes for current code:
	- need to test file size limits, currently working on test case
	
Poses several security issues:
	- users may be able to access any dir/file
	- currently no authentication
	
*/

?>
</body>
</html>
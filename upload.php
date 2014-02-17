
<html>
<body>
<?php	
	//$s = 5000;
	if ($_FILES["file"]["error"] > 0)		// setting file size limit to 5K
	// UPLOAD_ERR_FORM_SIZE
		{
		echo "Error uploading: " . $_FILES["file"]["error"];
		}
	elseif ($_FILES["file"]["size"] > 5000)	
		{
		echo "File size too large: " . $FILES["file"]["size"];
		}
	else
		{
		echo "'" . $_FILES["file"]["name"] . "'" . " Upload Successful!";
		//echo "Temp location of the file: " . $_FILES["file"]["tmp_name"];
		move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
		}
	
	
	



/*
Configuration for the server:
WAMP version 2.4
this file will be the configuration for the main file system. Users will have
access to directories which will act as their repositories. Notes for current code:
	- need to test file size limits, currently working on test case
*/

?>
</body>
</html>
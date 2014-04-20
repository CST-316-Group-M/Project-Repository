<!-- 
Original Author: Jacob Reber
Contributors: Jason Scribner, Lauren Krugen
Description: Uploads a file to whatever current directory
a user is in.
-->
<html>
<body>
<?php
session_start();
$uname = $_SESSION['email'];
$uploaddir = $_SESSION['upload'];
	
function uploadFile ($directory) {
	$test="/";
	$filename = $_FILES["file"]["name"];
	if ($_FILES["file"]["error"] > 0)
		{
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}
	else
		{
		if (file_exists($directory . $test . $_FILES["file"]["name"]))
		  {
		  echo ($directory . $_FILES["file"]["name"]);
		  echo $filename . " cannot be uploaded; file already exists.";
		  }
		else 	
		  {
		  move_uploaded_file($_FILES["file"]["tmp_name"],
		  $directory . $test . $_FILES["file"]["name"]);	
		  echo $filename . "has successfully been uploaded!";

		  }
		}
	}

uploadFile($uploaddir);

?>
<style>
	body { background-image:url('./img/wallpaper.jpg'); }	
    .button {
        display: inline-block;
        padding: 3px 5px;
        border: 1px solid #000;
        background: #eee;
    }

</style>
	<p>Click here to return to the main page:</p>
	<a href="/index_main.php" class="button">OK!</a>
	</body>
</html>

<?php
session_start();
/*
Author: Jason Scribner
Contributors: 

*/

	

	function upload_Pic() {
	$uname = $_SESSION['email'];
	$arr = explode("@", $uname);			//php explode function splits strings
	$uname= $arr[0];
	$directory = "/var/www/users/$uname/.set/";
	$filename = $_FILES["uploadpic"]["name"];

	$extension = ".png";
	$newfilename = $uname;
	if ($_FILES["uploadpic"]["error"] > 0)
		{
		echo "Error: " . $_FILES["uploadpic"]["error"] . "<br>";
		}
	else
		{
		if (file_exists($directory.$newfilename.$extension))
		  {
		  unlink($directory.$newfilename.$extension);
		  move_uploaded_file($_FILES["uploadpic"]["tmp_name"],
		  $directory.$newfilename.$extension);	
		  echo $newfilename.$extension . " has successfully been replaced and uploaded!";
		  //chmod ($directory.$newfilename.$extension, 0755); //added chmod to set for group permissions - Jason
		  }
		else 	
		  {
		  move_uploaded_file($_FILES["uploadpic"]["tmp_name"],
		  $directory.$newfilename.$extension);	
		  echo $newfilename.$extension . " has successfully been uploaded!";
		  //chmod ($directory . $newfilename.$extension, 0755); //added chmod to set for group permissions - Jason

		  }
		} 
	}		
upload_Pic();
?>
<html>
<body>
<style>
	body { background-image:url('./img/wallpaper.jpg'); }	
		

    .button {
        display: inline-block;
        padding: 3px 5px;
        border: 1px solid #000;
        background: #eee;
    }

</style>
	<p>Click here to return to settings:</p>
	<a href="/settings.php" class="button">OK!</a>
	</body>
</html>
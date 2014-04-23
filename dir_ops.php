<!--
Original Author: Lauren Krugen
Contributors: Jason
Description: functions to create and delete folders/files
-->

<html>
<body>
<?php
	session_start();
	$current = $_SESSION['currentdir'];
	$newdir = $_SESSION['newdir'];
	if (!isset($_SESSION['newdir'])) {
		echo "newdir session variable not set.";
	}
	createDir($current, $newdir);
	$_SESSION['newdir'] = null;
	function createDir($d, $n) {
		$new_d = $d . "/" . $n;
		if(!file_exists($new_d)) { //!exists is causing issues. could be the verion of PHP we have. file_exists works better for now. - Jason
			mkdir($new_d, 0777);	//permissions should change
			echo "Directory created successfully!";
		}
		else {
			echo "Cannot create; directory with that name already exists.";
		}
	}
	//createDir($current, $newdirname);
	
	/*
	echo "Current Directory: " . $current;
	$var = "foo";
	$newdir = $current . "/" . $var;
	echo " New Path: " . $newdir; 
	*/
	
	/*
	function deleteDir($d) {		//might have problems if path is missing /
		if(is_dir($d)) {			// isolate last portion of path to remove
			rmdir($d)				// explode - find last element of array - that will be the dir
		}
		else {
			echo "";
			}
	}
	*/
	

	/*
	//php offers unlink - unlinks filename but does not delete contents of file
	function deleteFile($f) {
		if(is_file($f) {
		
		}
	}
	*/
	
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
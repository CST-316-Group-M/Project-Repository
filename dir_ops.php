<!--
Original Author: Lauren Krugen
Contributors:
Description: functions to create and delete folders/files
-->

<html>
<body>
<?php
	session_start();
	$current = $_SESSION['currentdir'];
	$newdirname = $_SESSION['newdir'];
	
	echo "name of current dir: " . $current;
	echo "<br/>";
	echo "name of new dir: " . $newdirname;
	echo "<br/>";
	if (!isset($_SESSION['newdir'])) {
		echo "newdir session variable not set.";
	}
	
	function createDir($d, $n) {
	$new_d = $d . "/" . $n;
		//if(!exists($new_d)) {
			echo $new_d;
			mkdir($new_d, 0777);	//permissions should change
		//}
		//else {
		//	echo "Cannot create; directory with that name already exists.";
		//}
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
		if($is_dir($d)) {			// isolate last portion of path to remove
			rmdir($d)				// explode - find last element of array - that will be the dir
		}
		else {
			echo "";
			}
	}
	*/
	
	/*
	function deleteFile($f) {
		
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
</body>
</html>
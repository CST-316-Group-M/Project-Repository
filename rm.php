<?php
session_start();
$uname = $_SESSION['email'];
$arr = explode("@", $uname);			//php explode function splits strings
$uname= $arr[0];
/*
Author: Jason Scribner
Contributors: Jacob Reber

Description:
Allows the files selected by the checkboxes to be copied over to .old
Then unlinked (safer way of removal.)

BUGS:
* Cannot remove completely from server without root access. Possible fix is to fix permissions on the server somehow
* Return to the main hub not working
* Cannot access .old files yet to recover
*/
// Below is the recursive function to delete files selected by checkboxes		


$fpath = "/var/www/users/$uname/";
$old = "/var/www/users/$uname/.old/";
foreach ($_POST['checkbox'] as $file) {
	if(!is_dir($fpath . $file)) {
        if(file_exists($fpath . $file)) {
		copy($fpath . $file , $old . $file);
        unlink($fpath . $file); 
    }
	}
	else{
	rmdir($fpath . $file); // or system("rm -rf " . escapeshellarg($dir)) dont use this, next iteration release - Jason
    }
    
echo $file . " deleted successfully.";
}

?>
<html>
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
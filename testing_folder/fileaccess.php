<?php
	session_start();		// this session is carrying over from login.php
	
	/**
	Making this a class file for security purposes.
	This file should not be accessible to any users, must being 
	stored in file on server that requires admin privileges.
	**/
	class FileAccess {
		
		// 
		function createDir($userdir, $username) {
		//if(!exists)
			//mkdir("/var/www/users/$username/$userdir/", 0777);			//CHANGE THIS FILEPATH WHEN ON SERVER
			echo "Creating new directory: " . $userdir . "/ for user: " . $username;
		}
		
		// will be implemented
		function createFile() {
			
		}
		
		// will be implemented
		function removeDir() {
		
		}
		
		// will be implemented
		function removeFile() {
			$uname;
			$oldDest = "../users/$uname/.old";
			bool copy ( string $uname , string $oldDest);
			bool unlink (string $oldDest); }
		
			
		}
	}
	foreach ($delete as $id => $val) {
		if($val=='checked')
		
$fpath = "../users/$uname/";
$old = "../users/$uname/.old";
foreach ($_POST['checkbox[]'] as $file) {
    if(file_exists($path_to_folder . $file))) {
        unlink($path_to_folder . $file); 
    }
    elseif(is_dir($file)) {
        rmdir($file); // or system("rm -rf " . escapeshellarg($dir)); 
    }
}
echo "Files deleted successfully.";
?>
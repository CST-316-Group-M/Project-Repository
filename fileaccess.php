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
			$oldDest = "../users/$uname/old";
			//get file selection name (may need code borrowed from listing directories)
			//$uname = (filename)
			if (check file within old database folder)
			{ bool unlink ( string $uname); }
			else {	bool copy ( string $uname , string $oldDest);
					bool unlink (string $oldDest); }
		
			
		}
	}

?>
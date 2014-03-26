<?php
	session_start();		// this session is carrying over from login.php, session id may need to be regenerated
	
	/**
	Making this a class file for security purposes.
	This file should not be accessible to any users, must being 
	stored in file on server that requires admin privileges.
	**/
	class FileAccess {
		
		// 
		function createDir($userdir, $username) {
		//if(!exists)
			//mkdir("/var/www/cst316/users/$username/$userdir/", 0777);			//CHANGE THIS FILEPATH WHEN ON SERVER
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
		
		}
	}

?>
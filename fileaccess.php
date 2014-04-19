<?php
	session_start();		// this session is carrying over from login.php, session id may need to be regenerated
	
	/**
	Making this a class file for security purposes.
	This file should not be accessible to any users, must being 
	stored in file on server that requires admin privileges.
	**/
	class FileAccess {
		
<<<<<<< HEAD
		//WORKS, NEED REGISTRATION PAGE TO MAKE INTIAL FOLDER THAT IS THE SAME
		//NAME AS THE PRIMARY KEY (EMAIL) FOR IT TO WORK
		function createDir($userdir, $username) {	
		//if(!exists)
			mkdir("/wamp/www/cst316/users/$username/$userdir/", 0777);			//CHANGE THIS FILEPATH WHEN ON SERVER
			echo "Creating new directory: " . $userdir . " for user: " . $username;
=======
		// 
		function createDir($userdir, $username) {
		//if(!exists)
			//mkdir("/var/www/users/$username/$userdir/", 0777);			//CHANGE THIS FILEPATH WHEN ON SERVER
			echo "Creating new directory: " . $userdir . "/ for user: " . $username;
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
		}
		
		// will be implemented
		function createFile() {
			
		}
		
		// will be implemented
		function removeDir() {
		
		}
		
		// will be implemented
		function removeFile() {
<<<<<<< HEAD
		
		}
		
		function viewDir($username) {
			if ($dir = opendir("/wamp/www/cst316/users/$username/")) {
				while (false !== ($entry = readdir($dir))) {
					echo $entry;
				}
			
			closedir($dir);
				}
			}
=======
			$uname;
			//get file selection name (may need code borrowed from listing directories)
			//$uname = (filename)
			if (check file within old database folder)
			{ rm $uname /f (force removal) }
			else { create copy within old database folder then delete}
		
			
		}
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
	}

?>
<html>
	<body>
			<?php
				session_start();					///test for false return
				//set session variable for that user, not worrying about session hijacking atm.
				// $_SESSION['user1'] = "blah"; session continues from there
				$_SESSION['test'] = "hello world";
				$id = session_id();
				echo "Session Id: " . $id;
				
				/*
				require_once "databaseClass.php";
				
				Class SessionClass extends MyDatabase{
				
					
				//session_start();
				
				}
				
				$sesh = new SessionClass();
				$sesh->connectDB();
				*/
			?>
	</body>
</html>
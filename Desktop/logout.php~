<html>
	<body>
		<?php 
			session_start();
			$_SESSION = Array();
			session_destroy(); 
			//button submission will reference this page, unsets all 
			//session variables and destroys session
			echo nl2br("<h2>You have been logged out!</h2>\n<p>See you next time!</p>");
					
			if(!isset($_SESSION)) {
			echo "No session variables set.";
			}
			
			
		?>
	</body>
</html>
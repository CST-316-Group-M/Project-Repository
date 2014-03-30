<html>
	<body>
		<?php 
			session_start();
			$_SESSION = Array();
			session_destroy(); 
			//button submission will reference this page, unsets all 
			//session variables and destroys session
		?>
	<body>
</html>
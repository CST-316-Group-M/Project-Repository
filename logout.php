<html>
	<body>
<<<<<<< HEAD
		<style>
			body { background-image:url('./img/wallpaper.jpg'); }	
		</style>
=======
>>>>>>> master
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
<<<<<<< HEAD
</html>
<style type="position:absolute; top: 200px; left: 200px;"></style>
<form action="http://cst316m.no-ip.org/" method="post">
<input type="submit" name="submit" value="Log Back In!"></form>
</div>
=======
</html>
>>>>>>> master


	<?php
		Class User {
		$name = $POST['name'];
		$password = $_POST['password'];
		
		if((!isset($name)) || (!isset($password))) {
		
	?>
		<h1>Log In</h1>
		<form method="post" action="regis.php">
		<p>Username: <input type="text" name="name"></p>
		<p>Password: <input type="Password" name="Password"></p>
		
	<?php
		} else { 
		/* connect to mock? database and find matching user info
		
		}
		*/
		?>
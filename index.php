<?php

 // It can connect to function file 
include_once 'func.php';

connect();

?>
<!doctype html>
<html>
	<head>
		<title> Dynamiclist - </title>
		<h1 align="center">Users List</h1>
	</head>
	
	<body>
		<section>
			<article>
			<hgroup>
			</hgroup>
 
			<p align="center">
 
			<ul name="USERS" >

			<?php query() ?>

				</ul>

					<?php close() ?>
				</p>
			</article>
		</section>
	</body>
</html>
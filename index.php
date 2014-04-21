<?php

 // It can connect to function file 
include_once 'func.php';
//Connect to the socket
connect();

?>
<!doctype html>
<html>
	<head>
	<!-- Connects to the spreadsheet that allows changes to tags-->
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
		<title> Dynamiclist - </title>
		<h1>Users List</h1>
	</head>
	
	<body>
		<section>
			<article>
			<hgroup>
			</hgroup>
			
			<p align="center">
 
			<ul name="USERS" >
			<!-- Opens the query, and gets the information processed for display into an unordered list-->
			<?php query() ?>

				</ul>
					<!-- closes the query  -->
					<?php close() ?>
				</p>
			</article>
		</section>
	</body>
</html>
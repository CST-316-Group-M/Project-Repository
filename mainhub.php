<!DOCTYPE html>
<<<<<<< HEAD
=======
<title>This is the main hub page</title>
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
<html>
	<head>

	<?php
	/**
		This portion of php will be integrated with the html. For the time being, it is using the FileAccess
		class to allow authenticated users to create new files and folders.
	**/
		require_once "fileaccess.php";				
		if(isset($_POST['dirname'])) {					
			$dirname = $_POST['dirname'];
			}
<<<<<<< HEAD
			
=======

>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
		$user = $_SESSION['email'];
		$dirname = "homework_stuff";						
		$dir = new FileAccess();							
		//$dir->createDir($dirname, $user);
<<<<<<< HEAD
		
		
		
		
=======




>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1
		//mkdir("/wamp/www/cst316/users/$user/", 0777); ///put this in registration.php
	?>


<title>Group M Project Management</title>
<link rel="stylesheet" type="text/css" href="mainhub.css">
</head>
	<body>
		<div class="container">
		<div class="username"><h4> Logged in as: <?= $user ?> </h4></div>				<!-- change this to $_SESSION variable, add -->
		<div class="hboxed"><h1>Group M Project Management</h1></div> 
		<div class="messenger"><center><h3>Messenger Client</h3></center></div>
		<div class="hboxed2"> </div>
		<div class="navi"><center><h3>Navigation Bar</h3></center></div>
		<div class="RepoMang"></div>
			<table class="repoTable">
				<tr>
				<td width="90%"><b>Folders</b></th>		
				<td width="10%"><b>Status</b></th>
				</tr>
				<tr>

		<!-- User Directories -->

				<tr>
				<td>
				<a><?= $dir->viewDir($user) ?></a>
				</td>
				<td>Private</td>		
				</tr>
			  
				<tr>
				<td><a href="http://cst316m.no-ip.org/dir2/.index.php" target="_new">CST 316</a></td>
				<td>Private</td>		
				</tr>

				<tr>
				<td><a href="http://cst316m.no-ip.org/dir3/.index.php" target="_new">CST 420</a></td>
				<td>Public</td>		
				</tr>
   
		<!-- button to create a new directory/folder--> 
				<tr>
				<td><input type="text" name="dirname">
				<input type="button" value="Create New Folder"></td>			
				<td></td>		
				</tr>
			</table>
    
		<div class="widget2"></div>
		<div class="widget3"></div>
		<div class="widget4"></div>  
		<div class="bboxed"><center><font size="2">CST 316 Group M Project Management Assignment<br>Last Updated: March 25th, 2014<br>Product Owner: Dr. Kevin Gary</font></center></div>
		<div class="bboxed2"> </div>	
	</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> f86fabf64706d439fe1d46981ce24b39bae646d1

<!--
Author: Jacob Reber
Last Revised: 4/23/14

This is php file to update the user profile.
-->

<html>
	<body>
	<?php
	//connect to database
	$con = mysqli_connect("localhost","jake","drag7388","my_db"); 
	$info = mysqli_query($con, "SELECT * FROM users WHERE id=12");
	$row = mysqli_fetch_array($info);
	

	//When you click the submit button.
	if(isset($_POST['submit']))
            {
               // Putting data from textbox into variables
               $edu = @$_POST['edu'];
               $work = @$_POST['work']; 
			   
			   //update the database with any changes
			   $sql = mysqli_query($con,"UPDATE users SET education='$edu' WHERE id = '12'");	
			   $sql2 = mysqli_query($con,"UPDATE users SET experience='$work' WHERE id = '12'");
				//run the query to actually add the changes
				$retval = mysqli_query($con, $sql);
				$retval2 = mysqli_query($con, $sql2);
				mysqli_close($con);

				
            }
	
	?>
	
	<!DOCTYPE html>
	<html>
		<h1>Edit Profile</h1>
		<form method="post" action="editprofile.php">
		Education: 
		<textarea name="edu" COLS="40" ROWS="6" id="edu"><?php echo $row['education'] ?></textarea>
		Professional Experience: 
		<textarea name="work" COLS="40" ROWS="6" id="work"><?php echo $row['experience'] ?></textarea>
		<p><input type="submit" name="submit" value="Save" id="submit"></p></form>
		<form method="post" action="profile.php">
		<p><input type="submit" name="back" value="Back" id="back"></p></form>
		
	</body>
</html>
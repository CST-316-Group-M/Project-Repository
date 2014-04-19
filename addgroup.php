<!--
Original Author: Lauren
Contributors:
Description: queries users into group table for collaboration signified by
group IDs 
-->
<html>
	<html>
	<?php
	if(isset($_POST)) {
		if(isset($_POST['group'])) {
			$group = $_POST['group'];
		}
	}
	//connect to database 
	$con = mysqli_connect("localhost","webauth","webauth");
		if(!$con) {
			echo "Could not connect to database.";
			}
	//select the database 
	$sel = mysqli_select_db($con, 'CST316');
		if(!$sel) {
			echo "Could not select database.";
			}
	
	//this form will need to be moved to .index.php once on server
	?>
	
	<form>
	<input name="text" type="group" id="group">
	<input type="submit" name="Submit" value="Add Group Member">
	</form>
	
	<?php
	
	// jason - randomly generated group ID?
	//$ID = "";
	$creategroup = 	"select * from users where email = '".$group."'";
	$query = mysqli_query($con, $creategroup);
	
	/*
	
	add group ID to user and other info to group table
	loop until done
	boom. done. */
?>
</body>
</html>
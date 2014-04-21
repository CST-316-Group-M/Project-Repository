<!--
Original Author: Lauren
Contributors:
Description: queries users into group table for collaboration signified by
group IDs 
******* ******* ******** TO FIX:
	- GROUP ID DOES NOT INCREMENT
	- COLLAB BASED ON PROJECT/FOLDER/????
		+ might have to make it so we can only add collaborators on new projects for now
	- ADD FILE PERMISSIONS TO MEMBERS
-->
<html>
	<html>
	<?php
	session_start();
	$owner_email = $_SESSION['email'];
	
	///////////////////////////////////// Database Connection and Selection ////////////////
	$con = mysqli_connect("localhost","webauth","webauth");
		if(!$con) {
			echo "Could not connect to database.";
			}
	$sel = mysqli_select_db($con, 'CST316');
		if(!$sel) {
			echo "Could not select database.";
			}
	
	///////////////////////////////////// Getting Ready For Form Input /////////////////////////
	if(!isset($_POST['group'])) {
		echo "";
		
	//this form will need to be moved to .index.php once on server
	?>
	<h4> Ready To Collaborate? </h4>
	<p>Enter the email of the collaborator you wish to add:</p>
	<form action="addgroup.php" method="post">
	<input name="group" type="text" id="group">
	<input type="submit" name="Submit" value="Add Group Member">
	</form>
	
	<?php
	}
	
	else {
		$group = $_POST['group'];
		
		$creategroup = 	"select id, fname, lname from users where email = '".$group."'"; //can return name, etc if needed
		$query = mysqli_query($con, $creategroup);
		if(!$query) {
			echo mysqli_errno($con);
			echo "<br>";
			}	
			
		$row = mysqli_fetch_row($query);
		if(!$row) {
			echo mysqli_errno($con);
			}
		//////////////////////////////////// Adding Group Member //////////////////////////////////////////
		
		else {
			echo "ID returned: " . $row[0];
			echo "<br>";
			$member_id = $row[0];
			$f = $row[1];
			$l = $row[2];
			
			$addmember = "insert into groups(groupID, ownerID, memberID) values('2','".$owner_id."','".$member_id."')";
			
			$query2 = mysqli_query($con, $addmember);
			if(!$query2) {
				echo "Error number: " . mysqli_errno($con);
				echo "<br>";
			}
			else {
				echo $f . " " . $l . " has been added as a collaborator!";
			}
			

		}
	}
?>
<style>
	body { background-image:url('./img/wallpaper.jpg'); }	
    .button {
        display: inline-block;
        padding: 3px 5px;
        border: 1px solid #000;
        background: #eee;
    }

</style>
</body>
</html>
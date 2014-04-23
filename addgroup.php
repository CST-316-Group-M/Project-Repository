<!--
Original Author: Lauren
Contributors:
Description: queries users into group table for collaboration signified by
group IDs 
<<<<<<< HEAD
******* ******* ******** TO FIX:
	- GROUP ID DOES NOT INCREMENT
	- COLLAB BASED ON PROJECT/FOLDER/????
		+ might have to make it so we can only add collaborators on new projects for now
	- ADD FILE PERMISSIONS TO MEMBERS
-->
<html>
	<body>
	<?php
	session_start();
	$owner_email = $_SESSION['email'];
	$id = $_SESSION['ID'];
	
	///////////////////////////////////// Database Connection and Selection ////////////////
=======
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
>>>>>>> master
	$con = mysqli_connect("localhost","webauth","webauth");
		if(!$con) {
			echo "Could not connect to database.";
			}
<<<<<<< HEAD
=======
	//select the database 
>>>>>>> master
	$sel = mysqli_select_db($con, 'CST316');
		if(!$sel) {
			echo "Could not select database.";
			}
	
<<<<<<< HEAD
	///////////////////////////////////// Getting Ready For Form Input /////////////////////////
	if((!isset($_POST['group'])) && (!isset($_POST['dir']))) {
		echo "";
		
	//this form will need to be moved to .index.php once on server
	?>
	<h4> Ready To Collaborate? </h4>
	<p>Enter the email of the collaborator you wish to add:</p>
	<p>Enter the new group folder:</p>
	<form action="addgroup.php" method="post">
	<input name="group" type="text" id="group">
	<input name="dir" type="text" id="dir">
=======
	//this form will need to be moved to .index.php once on server
	?>
	
	<form>
	<input name="text" type="group" id="group">
>>>>>>> master
	<input type="submit" name="Submit" value="Add Group Member">
	</form>
	
	<?php
<<<<<<< HEAD
	}
	
	else {
		
		
		/////////////////////////////////////////// Get Owner ID //////////////////////////////////////////////////
		//echo "look at this quality debugging.";		
		//echo $owner_email;	
		$getownerID = "select id from users where email = '".$owner_email."'";
		$queryID = mysqli_query($con, $getownerID);
		if(!$queryID) {
			echo "Error number " . mysqli_errno($con);
			echo "<br>";
		}

		$row1 = mysqli_fetch_row($queryID);
		if(!$row1) {
			echo "Error number " . mysqli_errno($con);
			echo "<br>";		
		}
		else {
			$ownerID = $row1[0];
			$_SESSION['ID'] = $ownerID;
			//echo "Owner ID: " . $ownerID;
		}
		

		//////////////////////////////////////////// Get Max ID Information //////////////////////////////////////
		$getmax = "select max(groupID) as max from groups;";
		$queryMaxID = mysqli_query($con, $getmax);
		if(!$queryMaxID) {
			echo "(Getting Max ID)Error number " . mysqli_errno($con);
			echo "<br>";
		}

		$rowMax = mysqli_fetch_array($queryMaxID);
		if(!$rowMax) {
			echo "(MAX ID)Error number " . mysqli_errno($con);
			echo "<br>";		
		}
		else {
			$max = $rowMax['max'];
			
		}

		//////////////////////////////////////////// Find Member Information //////////////////////////////////////
		$group = $_POST['group'];
		$creategroup = 	"select id, fname, lname from users where email = '".$group."'"; //can return name, etc if needed
		$query = mysqli_query($con, $creategroup);
		if(!$query) {
			echo "Error number: " . mysqli_errno($con);
			echo "<br>";
			}	
			
		$row = mysqli_fetch_row($query);
		if(!$row) {
			echo "Could not find user.";
			echo "Error number: " . mysqli_errno($con);
			}
		
		//////////////////////////////////////////// Adding Group Member //////////////////////////////////////////
		else {
			//echo "ID returned: " . $row[0];
			//echo "<br>";
			$member_id = $row[0];
			$f = $row[1];
			$l = $row[2];
			$max = $max + 1;
			echo $max;
			$addmember = "insert into groups(groupID, ownerID, memberID) values('".$max."', '".$ownerID."','".$member_id."')";
			$query2 = mysqli_query($con, $addmember);
			if(!$query2) {
				echo "Error number: " . mysqli_errno($con);
				echo "<br>";
				}
		
			else {
				
				$mkgroupdir = mkdir("/var/www/groups/$max/", 0777);
				$ndir = $_POST['dir'];
				echo $f . " " . $l . " has been added as a collaborator!";
				$makedir = mkdir("/var/www/groups/$max/$ndir/", 0777);	
				if(!$makedir) {
					echo "Error creating directory.";
				}
				
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
<p>Click here to return to the main page:</p>
<a href="/index_main.php" class="button">OK!</a>
</body>
</html>
=======
	
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
>>>>>>> master

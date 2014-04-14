<html>
	<body>
	<?php
	$con=mysqli_connect("localhost","jake","drag7388","my_db");
	$info = mysqli_query($con,"SELECT * FROM users WHERE id=12");
	$row = mysqli_fetch_array($info);

/*	
	function edit($db)
	{
		$edu = $_POST['edu'];
        $work = $_POST['work'];
		$education = mysqli_query($db,"SELECT education FROM users WHERE id=12");
		$experience = "SELECT experience FROM users WHERE id = 12";

				$query = "INSERT INTO users(education,experience) values('".$edu."','".$work."')";
				try
				{
					$db->beginTransaction();
					$db->exec($query);
					$db->commit();
				}
				catch(Exception $e){}
				
				$result = mysql_query($db, $query);
					
					if (!$result) {
						echo "Save Failed.";
						return false;
					}
					else {
						echo "Save Successful!";
						return true;	
					}
	}
	*/
	
	if(isset($_POST['submit']))
            {
               // Putting data from textbox into variables
               $edu = $_POST['edu'];
               $work = $_POST['work']; 
               
			   $con = mysqli_connect("localhost","jake","drag7388","my_db") or die ("Can't connect");
                            
               // Getting the form variables and then placing their values into the MySQL table
				mysql_query("INSERT INTO users(education, experience) Values ('".$edu."', '".$work."') SELECT id, NULL FROM users WHERE users.id=12");
				//mysql_query("INSERT INTO blog (title, article) VALUES ('".$title."', '".$article."')");
				
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
		<p><input type="submit" name="submit" value="Save" id="submit"></p>
		
		


	<!-- 
	
	KNOWN ISSUES/NEEDED FEATURES
	- ACCOUNT DUPLICATES
	- FILTER INPUT
	
	-->
	</body>
</html>
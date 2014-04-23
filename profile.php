<!--
Author: Jacob Reber
Last Revised: 4/23/14

This is php file for the user profile.
-->
<!DOCTYPE html>

  <head>
    <title>Group M Project Managament</title>
    <link rel="stylesheet" type="text/css" href="template.css">
    <link rel="stylesheet" type="text/css" href="profile.css">
  </head>


<?php
//connect to database
$con=mysqli_connect("localhost","jake","drag7388","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//select the user to get info from
$result = mysqli_query($con,"SELECT * FROM users WHERE id=12");
//store the result in variable $row
$row = mysqli_fetch_array($result)
?>
<!-- Display the first and last name of the user -->
	<div class="Header"><?php echo $row['fname'] . " " . $row['lname'];  ?></div>


<div class="education">
<h1><u>Education</u><h1>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo nl2br($row['education']); // displays the users education?></font>
</td>
<br>
</div>

<div class="work">
<h1><u>Professional Experience</u><h1>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo nl2br($row['experience']); // displays the users work experience?></font>
</td>
</div>
<form method="post" action="editprofile.php">
<p><input type="submit" name="submit" value="Edit Info"></p>

<?php
mysqli_close($con);
?>
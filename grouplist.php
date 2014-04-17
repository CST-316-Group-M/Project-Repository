Is it working?



<?php
// Create connection
session_start();
$email = $_SESSION['email'];
$con=mysqli_connect("localhost","webauth","webauth","CST316");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query ($con, "SELECT groupn FROM users WHERE email = '".$email."'");
if (!$result) {
	echo 'Could not run query:'.mysqli_error();
}
$row = mysqli_fetch_row($result);
$groupn=$row[0];
$result1 = mysqli_query ($con, "SELECT groupname FROM groups WHERE groupID = '".$groupn."'");
if (!$result1) {
	echo 'Could not run query:'.mysqli_error();
}
$row1 = mysqli_fetch_row($result1);
$groupname = $row1[0];
$result2 = mysqli_query ($con, "SELECT fname FROM users WHERE groupn = '".$groupn."'");
if (!$result2) {
	echo 'Could not run query:'.mysqli_error();
}
$result3 = mysqli_query ($con, "SELECT COUNT(fname) FROM users WHERE groupn = '".$groupn."'");
$row3 = mysqli_fetch_row($result3);
$gamount = $row3[0];
echo $gamount;
if (!$result3) {
	echo 'Could not run query:'.mysqli_error();
}
echo "<table border='1'>
<tr>
<th>Group Members</th>
</tr>";

while($row2 = mysqli_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td>" . $row2['fname'] . "</td>";
  echo "</tr>";
  }
 echo "</table>"; 
  
echo "<th><p> Group name: </p></th>
<tr> $groupname</tr>"
?>


<?php
$con=mysqli_connect("localhost","jake","drag7388","my_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM users WHERE id=12");

$row = mysqli_fetch_array($result)
?>
	<div class="Header"><?php echo $row['fname'] . " " . $row['lname'];  ?></div>
<table>
  <tr>
    <th align="left">Education </th>
    <th align="left">Professional Experience</th>
  </tr>
<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo nl2br($row['education']); ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo nl2br($row['experience']); ?></font>
</td>
</tr>
</table




<?php
  echo $row['fname'] . " " . $row['education'];
  echo "<br><br>";

mysqli_close($con);
?>
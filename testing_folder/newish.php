<?php


$con=mysqli_connect("localhost","webauth","webauth","CST316");
$name='jason';
$result = mysqli_query ($con, "SELECT groupname FROM groups WHERE owner = '".$name."'");
if (!$result) {
	echo 'Could not run query:'.mysqli_error();
}
else{ echo "connected";}
$row = mysqli_fetch_row($result);
echo $row;
$groupn=$row[0];
echo $groupn;

?>
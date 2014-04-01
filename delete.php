<h1>Deleting Multiple Records using PHP &amp; MySQL</h1>
<p>&nbsp;</p>
<?php
$host="localhost"; // Host name
$username="jake"; // Mysql username
$password="drag7388"; // Mysql password
$db_name="tester"; // Changed database name
$tbl_name="test_mysql";
mysql_connect($host, $username, $password)or die("cannot connect");
mysql_select_db($db_name)or die("cannot select DB");
$sql="SELECT * FROM $tbl_name";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
?>
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr><td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC"><tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="4" bgcolor="#FFFFFF"><strong>Delete multiple rows in mysql</strong> </td>           </tr>
<tr><td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Id</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Lastname</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Email</strong></td></tr>
<?php while($rows=mysql_fetch_array($result, MYSQL_ASSOC)){ ?>

<tr><td align="center" bgcolor="#FFFFFF">
<input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $rows['id']; ?>">
</td><td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td><td bgcolor="#FFFFFF">
<?php echo $rows['name']; ?></td><td bgcolor="#FFFFFF"><?php echo $rows['lastname']; ?>    </td>
<td bgcolor="#FFFFFF"><?php echo $rows['email']; ?>
</td></tr>
<?php } ?>
<tr><td colspan="5" align="center" bgcolor="#FFFFFF">
<input name="delete" type="submit" id="delete" value="Delete"></td></tr>
<?php

if(isset($_POST['delete'])){
$checkbox = $_POST['checkbox'];
for($i=0;$i<count($_POST['checkbox']);$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM $tbl_name WHERE id='$del_id'";
print $sql;
mysql_query($sql);

$result = mysql_query($sql);}

if($result){echo "<meta http-equiv=\"refresh\" content=\"0;URL=delete.php\">";}}
mysql_close();
?>
</table></form></td></tr></table>
<p>Record count: <?php echo number_format($count) ?></p>
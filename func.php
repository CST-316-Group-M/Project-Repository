<?php

include_once 'db.inc.php'; // it is including connection

function connect() // this function connects to mysql  database

{
 // this step can verify host, users, and password are correct before the connection; otherwise, connection will be failed if one of them is incorrect  
mysql_connect(DB_HOST,DB_USERS,DB_PASS) or die('cloud not connect to database'. mysql_error());

mysql_select_db(DB_Name);


}

// WE created connected function after we created closed function for database
function close()

{

mysql_close();

}

// It is query from database from the table

function query()

{
 // It can select all the items of database
&myData = mysql_query("SELECT * FROM  ");

while($record = mysql_fetch_array(&myData))

{

echo '<option value ="' . $record[''] . '">' . $record[''] . '</option>';

//<option value=""> </option>

}

}

?>
<?php
/*
Author: Eyaad
Last Revise: Jordan 4/22/14
*/


include_once 'db.php'; // it is including connection

function connect() // this function connects to mysql  database
	{
 		// this step can verify host, users, and password are correct before the connection; otherwise, 
 		//connection will be failed if one of them is incorrect  
		mysql_connect(DB_HOST,DB_USER,DB_PASS) or die('could not connect to database'. mysql_error());

		mysql_select_db(DB_NAME);
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
    $myData = mysql_query("SELECT * FROM users ORDER BY fname ASC");
	//While &myData loads information from the query, fetch that information....
    while($record = mysql_fetch_array($myData))
    	{
	 		//...and push the information into a list that displays the information retrieved in string from
        	echo '<ul value ="' . $record['users'] . '"><div class="namebar"><div class="name">' . $record['fname'] . ' ' . $record['lname'] . '</div><div class="mail"><a href="mailto:' . $record['email'] . '">Message</a></div></div></ol>';
    	}//THe above echo was revised by jordan so that it would display properly on the page
}

?>
<?php

 // It can connect to function file 
include_once 'func.inc.php';

connect();

?>



<select name=""> // Select the items from the table

<?php query() ?>

</select>

<?php close() ?>
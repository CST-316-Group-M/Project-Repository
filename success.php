<?php
if (isset($_POST['Button'])) {
	echo "HELLO!";
	header('Location: /login.php');
	}
?>
<style>
    /* or put this in your stylesheet */

    .button {
        display: inline-block;
        padding: 3px 5px;
        border: 1px solid #000;
        background: #eee;
    }

</style>
	<html>
		<h1>Done!</h1>
	<body>
	<p>Good to go! Click here to return to the main page:</p>
	<a href="/login.php" class="button">OK!</a>
	</body>
</html>




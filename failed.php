<<<<<<< HEAD
<?php
=======



<?php
//comments needed!
>>>>>>> master
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
		<h1>Account already exists</h1>
	<body>
	<p>Registration failed, <br><br> Click here to return to the main page:</p>
	<a href="/login.php" class="button">Main</a>
	<p>Registration failed, Click here to return to the registration page:</p>
	<a href="/registration.php" class="button">Registration</a>
	</body>
</html>





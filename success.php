<?php
<<<<<<< HEAD
session_start();
$email=$_SESSION['email'];
$to = $email;
$subject = "Welcome to the group!";
$message = "You have successfully registered!";
$from = "service@GroupM.DrGary";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
?>
<style>
	body { background-image:url('./img/wallpaper.jpg'); }	
		
=======
//comments needed!
if (isset($_POST['Button'])) {
	echo "HELLO!";
	header('Location: /login.php');
	}
?>
<style>
    /* or put this in your stylesheet */
>>>>>>> master

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
<<<<<<< HEAD
	<a href="/index_main.php" class="button">OK!</a>
=======
	<a href="/login.php" class="button">OK!</a>
>>>>>>> master
	</body>
</html>





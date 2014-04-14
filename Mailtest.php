<?php
$to = $email;
$subject = "Welcome to the group!";
$message = "You have successfully registered!";
$from = "service@GroupM.DrGary";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
?>
<?php
$to = "jscribne@asu.edu, lkrugen@asu.edu, jareber@asu.edu, jtsmit11@asu.edu";
$subject = "PHP Test mail";
$message = "This is a test email";
$from = "service@GroupM.DrGary";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>
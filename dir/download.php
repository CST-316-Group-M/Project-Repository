


<?php

//This code lists all files in current directory (can be changed).
//This skips "." and ".." for cleanliness
  if ($handle = opendir('/var/www/root System/jtsmit11/Work')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<li><a href="/root System/jtsmit11/Work/'.$file.'">'.$file.'</a></li>';
      }
    }
    closedir($handle);
  }
?>
<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>

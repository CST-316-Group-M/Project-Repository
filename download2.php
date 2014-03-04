


<?php

//This code lists all files in current directory (can be changed).
//This skips "." and ".." for cleanliness
  if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<li><a href="'.$file.'">'.$file.'</a></li>';
      }
    }
    closedir($handle);
  }
?>
<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>

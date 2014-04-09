<?php
$URL = "http://localhost/Server%20Replica/index_main.php";
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "./users/users/asu@asu.edu/test/" . $_FILES["file"]["name"]);
	  header ("Location: $URL");
      }
	}
?>
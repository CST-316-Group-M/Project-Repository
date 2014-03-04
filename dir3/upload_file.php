<?php
$URL = "http://cst316m.no-ip.org/dir3/.index.php";
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
      "../root System/jtsmit11/Public Repo/" . $_FILES["file"]["name"]);
	  header ("Location: $URL");
      }
	}
?>
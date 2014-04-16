<html>
<body>
<?php
session_start();
$uname = $_SESSION['email'];
$uploaddir = $_SESSION['upload'];
$URL = "index_main.php";	
$test="/";
echo $uploaddir; 
echo ("<br>");
echo getcwd();
echo ("<br>");
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
    if (file_exists($uploaddir . $test . $_FILES["file"]["name"]))
      {
	  echo ($uploaddir . $_FILES["file"]["name"]);
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else 	
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $uploaddir . $test . $_FILES["file"]["name"]);
	  echo "Should have uploaded correctly";
	  //header ("Location: $URL");
      }
	}
?>
</body>
</html>
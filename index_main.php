<?php
/*index_main.php was part of an original file that was created by Chris Coyer. He is the author of css-tricks.com.
Please review the readme document in the main folder for more information about the permission to use his code.

Author: Chris Coyer
Co-authors: Jordan Smith, Jason, Lauren, Jacob
Last Updated: 4/22/14
*/ 


//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();
//require_once "dir_ops.php";
//session variables
$email = $_SESSION['email'];
$arr = explode("@", $email);			//php explode function splits strings
$uname= $arr[0];
getfname();	  // This function gets the first name of the user - Jason
$fname = $_SESSION['fname'];
//check to see if a new folder has been called.
if (isset($_POST['submit1'])) { 
 $_SESSION['newdir'] = $_POST['newdir'];
	header('Location: dir_ops.php');}

// The Function getfname is used to make a query to the database so we can get the first name of the user that is currently logged in and display it on the page.
function getfname(){
	$con=mysqli_connect("localhost","webauth","webauth","CST316");  //PHP doesn't like using $db for some reason - Jason
	$email = $_SESSION['email'];
	$query = "SELECT fname FROM users WHERE email = '".$email."'";
	$result1 = mysqli_query($con, $query);
	$fetchy = mysqli_fetch_row($result1);
	$name = $fetchy[0];
	$_SESSION['fname'] = $name;// Assigns the variable $name to the session variable to be later called when needed.
 }
//if (isset($_POST'checkboxes[]')); 

// Adds pretty filesizes
function pretty_filesize($file) 
{
    $size = filesize($file);
    if ($size < 1024) {
        $size = $size . " Bytes";
    } elseif (($size < 1048576) && ($size > 1023)) {
        $size = round($size / 1024, 1) . " KB";
    } elseif (($size < 1073741824) && ($size > 1048575)) {
        $size = round($size / 1048576, 1) . " MB";
    } else {
        $size = round($size / 1073741824, 1) . " GB";
    }
    return $size;
}
date_default_timezone_set("America/Phoenix"); // Sets the time zone to phoenix, Displays on the repo.
$hide = "Test";
if (!isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == "" || substr($_SERVER['QUERY_STRING'],0,2) == ".." || strstr($_SERVER['QUERY_STRING'], "..")) 
{
    $currdir = "./users/$uname";//Sets the current directory
	
} 
else 
{
    $currdir = urldecode($_SERVER['QUERY_STRING']);
}
if ($currdir == "./users/$uname") //sets the root directory
 
    $label = "Root";
else 
{
    $path = explode('/', $currdir);
    $label = $path[count($path)-1]; 
}
?>
<!--This begins the HTML Version of the page.-->
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--The HTML Link Tab is what allows us to link various files to the page so we can call on them when they need it.-->
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Management</title>
        <link rel="stylesheet" type="text/css" href="style_main.css">
        <link rel="stylesheet" type="text/css" href="template_main.css">
        <script src="./sorttable.js"></script>
    </head>
    <body>
		<!--div Class's allow for me to be able to edit multiple elements togethor or speratley.-->
        <div class="container1">
        <div class="username"><h1>Welcome to your Main Hub, <?=$fname?> !</h1></div>
	<div class="sboxed"></div>
        <div class="hboxed"><h1>Group M Project Management</h1></div>
        <div class="messenger"><center><h3>Messenger Client</h3></center></div>
        <div class="hboxed2"> </div>
        <!--navbar class is the container that holds the navigation bar-->
        <div class="navbar">
            <ul>
		<div class="barcontainer">
                <div class="bar"><a href="index_main.php">Home</a></div> 
                <div class="bar"><a href="directory.php">Directory</a></div>
                <div class="bar"><a href="settings.php">Settings</a></div> 
                <div class="bar"><a href="index_profile.php">Profile</a></div>
                <div class="bar"><a href="logout.php">Log Out</a></div>
		</div>
            </ul>
		
        </div>
        <!--The img class is the class that defines the properties of the user image-->
	<img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
        <div id="container"><!--This is the container that allows me to be able to put multiple functions in the same area as the repo table.-->
            <table class="sortable">
                <thead>
                    <tr>
                        <th>File Name</th>
                         <th>Type</th>
                        <th>Size</th>
                        <th>Last Modified</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
<?php
// Opens directory
$myDirectory = opendir($currdir);

// Gets each entry
while ($entryName = readdir($myDirectory)) 
{
    if($entryName != "." && $entryName !=".." && $entryName !=".old" && $entryName !=".set"){
        $dirArray[] = $entryName; }
}

// Closes directory
closedir($myDirectory);

// Counts elements in array
$indexCount = count($dirArray);

// Sorts files
//sort($dirArray);
// Loops through the array of files
for ($index = 0; $index < $indexCount; $index++) 
{
	$file = $dirArray[$index];
    // Decides if hidden files should be displayed, based on query above.
    if (substr("$dirArray[$index]", 0, 1) != $hide || ($currdir != '.' && $dirArray[$index] == "..")) {

        // Resets Variables
        $favicon = "";
        $class = "file";

        // Gets File Names
        $name = $dirArray[$index];
        $namehref = ($currdir == "." ? "" : $currdir . '/') . $dirArray[$index];
		$fullname = $currdir . '/' . $dirArray[$index];

        // Gets Date Modified
        $modtime = date("M j Y g:i A", filemtime($fullname));
        $timekey = date("YmdHis", filemtime($fullname));

        // Separates directories, and performs operations on those directories
        if (is_dir($currdir . '/' . $dirArray[$index])) {
            $extn = "&lt;Folder&gt;";
            $size = "&lt;Folder&gt;";
            $sizekey = "0";
            $class = "dir";

            // Gets favicon.ico, and displays it, only if it exists.
            if (file_exists("$namehref/favicon.ico")) {
                $favicon = " style='background-image:url($namehref/favicon.ico);'";
                $extn = "&lt;Website&gt;";
            }
            if ($currdir == "." && $dirArray[$index] == "..")
                $namehref = "";
            elseif ($dirArray[$index] == "..") {
                $dirs = explode('/', $currdir);
                unset($dirs[count($dirs) - 1]);
                $prevdir = implode('/', $dirs);
                $namehref = '?' . $prevdir;
            }
            else
                $namehref = '?' . $namehref;
        }
        // File-only operations
        else {
            // Gets file extension
            $extn = pathinfo($dirArray[$index], PATHINFO_EXTENSION);

            // Prettifies file type
            switch ($extn) {
                case "png": $extn = "PNG Image";
                    break;
                case "jpg": $extn = "JPEG Image";
                    break;
                case "jpeg": $extn = "JPEG Image";
                    break;
                case "svg": $extn = "SVG Image";
                    break;
                case "gif": $extn = "GIF Image";
                    break;
                case "ico": $extn = "Windows Icon";
                    break;

                case "txt": $extn = "Text File";
                    break;
                case "log": $extn = "Log File";
                    break;
                case "htm": $extn = "HTML File";
                    break;
                case "html": $extn = "HTML File";
                    break;
                case "xhtml": $extn = "HTML File";
                    break;
                case "shtml": $extn = "HTML File";
                    break;
                case "php": $extn = "PHP Script";
                    break;
                case "js": $extn = "Javascript File";
                    break;
                case "css": $extn = "Stylesheet";
                    break;

                case "pdf": $extn = "PDF Document";
                    break;
                case "xls": $extn = "Spreadsheet";
                    break;
                case "xlsx": $extn = "Spreadsheet";
                    break;
                case "doc": $extn = "Microsoft Word Document";
                    break;
                case "docx": $extn = "Microsoft Word Document";
                    break;

                case "zip": $extn = "ZIP Archive";
                    break;
                case "htaccess": $extn = "Apache Config File";
                    break;
                case "exe": $extn = "Windows Executable";
                    break;

                default: if ($extn != "") {
                        $extn = strtoupper($extn) . " File";
                    } else {
                        $extn = "Sconosciuto";
                    } break;
            }

            // Gets and cleans up file size
            $size = pretty_filesize($fullname);
            $sizekey = filesize($fullname);
        }
    
      // Output
	  echo("<tr class='$class'>
            <td><a href='$namehref'$favicon class='name'>$name</a></td>
            <td><a href='$namehref'>$extn</a></td>
            <td sorttable_customkey='$sizekey'><a href='$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='$namehref'>$modtime</a></td>" .
			'<td align="center"><form action="rm.php" method="post"> <input name="checkbox[]" type="checkbox" class="select" value="'.$name.'"><input type="submit" value="delete"/></form></td>' . "</tr>");
    }
}

	

?>

                </tbody>
            </table>

        <!-- <h2><?php echo("<a href='$ahref'>$atext hidden files</a>"); ?></h2> -->
<!--THis the function that allows users to upload files to the desired folders--> 
<div class="upload_file">
<form id="uploadfile" action="upload_file.php" method="post"
        enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file">
        <input type="submit" name="submit" value="Submit"></form>
</div>
<!-- This is the method that allows for users to create new folders-->
<div class="new_dir">
<form action="index_main.php" method="post">
<input type="text" name="newdir">
<input type="submit" name="submit1" value="New Folder"></form>
</div>
<!--This is the method that allows users to add colaborators to a group folder-->
<div class="colab">
<form action="addgroup.php" method="post">
<input type="submit" name="submit2" value="Add Collaborators!"></form>
</div>
<!-- This is the method that allows users to see their group folders and the group folders that they are collaborators in.-->
<div class="group">
<form action="showgroup.php" method="post">
<input type="submit" name="submit3" value="view group folders"></form>
</div>

</div>   
    </body>
</html>
<?php
//to fix the issue of the files not being uploaded to the correct folder i placed this section at the bottom so that it would be called last -Jordan
    $_SESSION['upload'] = $currdir;
    $_SESSION['currentdir'] = $currdir;
    $_SESSION['newdir'] = $_POST['newdir'];
    ?>
    

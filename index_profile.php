<?php
/*index_profile.php was part of an original file that was created by Chris Coyer. He is the author of css-tricks.com.
Please review the readme document in the main folder for more information about the permission to use his code.

Author: Chris Coyer
Co-authors: Jordan Smith
Last Updated: 4/22/14
*/  

//session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
session_start();
$uname1 = $_SESSION['email'];
$fname = $_SESSION['fname'];
$arr = explode("@", $uname1);			//php explode function splits strings
$uname= $arr[0];


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
date_default_timezone_set("America/Phoenix");// Sets the time zone to phoenix, Displays on the repo.
$hide = "Test";
if (!isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == "" || substr($_SERVER['QUERY_STRING'],0,2) == ".." || strstr($_SERVER['QUERY_STRING'], "..")) 
{
    $currdir = "./users/$uname/Public Folder/";//Sets the public folder directory
} 
else 
{
    $currdir = urldecode($_SERVER['QUERY_STRING']);
}
if ($currdir == "./users/$uname")  //sets the root directory
    $label = "Root";
else 
{
    $path = explode('/', $currdir);
    $label = $path[count($path)-1]; 
}


//connect to database
$con=mysqli_connect("localhost","webauth","webauth","CST316");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//select the user to get info from
$result = mysqli_query($con,"SELECT * FROM users WHERE email='". $uname1 ."'");
//store the result in variable $row
$row = mysqli_fetch_array($result)





?>
<!--This begins the HTML Version of the page.-->
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--The HTML Link Tab is what allows us to link various files to the page so we can call on them when they need it.-->
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Managament</title>
        <link rel="stylesheet" type="text/css" href="template_profile.css">
        <link rel="stylesheet" href="./style_profile.css">
        <script src="./sorttable.js"></script>
    </head>
    <body>
<!--div Class's allow for me to be able to edit multiple elements togethor or speratley.-->
   <div class="container1">
        <div class="hboxed"><h1>Group M Project Managment</h1></div>
      <div class="hboxed2"> </div>
      <!--navbar class is the container that holds the navigation bar-->
      <div class="navbar">
            <ul>
           <div class="bar"><a href="index_main.php">Home</a></div> 
                <div class="bar"><a href="directory.php">Directory</a></div>
                <div class="bar"><a href="settings.php">Settings</a></div> 
                <div class="bar"><a href="index_profile.php">Profile</a></div>
                <div class="bar"><a href="logout.php">Log Out</a></div> 
            </ul>
            
        </div>
        <!--The img class is the class that defines the properties of the user image-->
       <img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
      <div class="Header"><?=$fname?></div>
      <div class="education"> 
<h1><u>Education</u><h1>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo nl2br($row['education']); // displays the users education?></font>
</td>
<br>
    </div>
    
    <div class="work">
      <h1><u>Professional Experience</u><h1>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo nl2br($row['experience']); // displays the users work experience?></font>
</td>
    </div>

        <div id="container"><!--This is the container that allows me to be able to put multiple functions in the same area as the repo table.-->
            <table class="sortable">
                <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Last Modified</th>
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

            // Cleans up . and .. directories
            /*if ($name == ".") {
                $name = ". (Current Directory)";
                $extn = "&lt;System Dir&gt;";
                $favicon = " style='background-image:url($namehref/.favicon.ico);'";
            }
            if ($name == "..") {
                $name = ".. (Previous Folder)";
                $extn = "&lt;System Dir&gt;";
            }*/
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
        echo("
        <tr class='$class'>
            <td><a href='$namehref'$favicon class='name'>$name</a></td>
            <td><a href='$namehref'>$extn</a></td>
            <td sorttable_customkey='$sizekey'><a href='$namehref'>$size</a></td>
            <td sorttable_customkey='$timekey'><a href='$namehref'>$modtime</a></td>
        </tr>");
    }
}
?>

                </tbody>
            </table>

        <!-- <h2><?php echo("<a href='$ahref'>$atext hidden files</a>"); ?></h2> -->
        </div>
    </body>
</html>
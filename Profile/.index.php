<?php
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
date_default_timezone_set("America/Phoenix");
$hide = "Test";
if (!isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == "" || substr($_SERVER['QUERY_STRING'],0,2) == ".." || strstr($_SERVER['QUERY_STRING'], "..")) 
{
    $currdir = "../root System/jtsmit11/Public Repo";
} 
else 
{
    $currdir = urldecode($_SERVER['QUERY_STRING']);
}
if ($currdir == "../root System") 
    $label = "Root";
else 
{
    $path = explode('/', $currdir);
    $label = $path[count($path)-1]; 
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="./.favicon.ico">
        <title>Group M Project Managament</title>
        <link rel="stylesheet" type="text/css" href="profile.css">
        <link rel="stylesheet" type="text/css" href="template.css">
        <link rel="stylesheet" href="./.style.css">
        <script src="./.sorttable.js"></script>
    </head>
    <body>

   <div class="container1">
        <div class="hboxed"><h1>Group M Project Managment</h1></div>
      <div class="hboxed2"> </div>
      <div class="navbar">
            <ul>
                <div class="bar"><a href="http://cst316m.no-ip.org/Mainhub_Dir/.index.php">Home</a></div> 
                <div class="bar"><a href="#">User Directory</a></div>
                <div class="bar"><a href="#">How to</a></div> 
                <div class="bar"><a href="http://cst316m.no-ip.org/Profile/.index.php">Profile</a></div> 
                <div class="bar"><a href="#">Settings</a></div> 
                <div class="bar"><a href="#">Log Out</a></div> 
            </ul>
            
        </div>
      <img class="user_pic" src="user_picture\picture.jpg">
      <div class="Header"> Jordan Smith</div>
      <div class="education"> 

    <h1><u>EDUCATION</u></h1>
    <h4>Bachelor of Science in Applied Computer Science
    <br>Arizona State University Polytechnic, Mesa, Arizona
    <br>Expected Graduation Date: May 2015</h4>
  
    <h3>Certificate in Cisco Networking</h3>
 
    <ul>
    <li>Cisco Certified Entry Networking Technician</li>
    <li>Cisco Certified Network Associate</li>
    <li>Cisco Certified Network Associate Security</li>
    <li>Cisco Certified Network Associate Voice</li>
    <li>Cisco Certified Network Professional</li>
    </ul>

    <h4>Expected Graduation Date: June 2014</h4>
    </div>
    <div class="work">
      <h1><u>PROFESSIONAL EXPERIENCE</u></h1>
      <h4>Support Technician, Arizona State University, Mesa, Arizona                     <br>September 2010 - Present</h4>
        <ul><li> Assisted faculty and teachers in technical troubleshooting on a daily basis.</li>
        <li>Set up video conferences and prepped classrooms for classes and special events.</li>
        <li>Imaged both Macintosh and Windows Operating Systems and installed software.</li>
      </ul>
      <h4>Customer Service/Data Entry, Kevin Smith State Farm, Goodyear, Arizona              <br>May 2004 - Present</h4>
        <ul><li>Reconciled and balanced the business’s accounting programs.</li>
        <li>Assisted in assorted marketing programs and booth events to gain new clients.</li>
      </ul>
      <h4>Sales/ Cashier, Radio Shack, Mesa, Arizona                                <br>February 2010 - September 2010</h4>
        <ul><li>Managed the store while it was between management.</li>
        <li>Used various selling techniques to meet monthly quotas.</li>
        <li>Provided knowledge and support to customers on a daily basis.</li>
        <ul>
    </div>
     <div class="bboxed"><center><font size="2">CST 316 Group M Project Managment Assignment<br>Last Updated: March 1st, 2014<br>Project Owner: Dr. Kevin Gary</font></center></div>
       <div class="bboxed2"> </div>
        <div id="container">
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
    $dirArray[] = $entryName;
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
            if ($name == ".") {
                $name = ". (Current Directory)";
                $extn = "&lt;System Dir&gt;";
                $favicon = " style='background-image:url($namehref/.favicon.ico);'";
            }
            if ($name == "..") {
                $name = ".. (Previous Folder)";
                $extn = "&lt;System Dir&gt;";
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
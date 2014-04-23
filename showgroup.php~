<!--
Original Author: Lauren Krugen
Contributors: 
Description: Displays folders you share with other people AND folders shared with you
-->

<html>
<body>
<?php
	session_start();
	$currdir = "./groups/$GID";
	$user = $_SESSION['email'];
	$ID = $_SESSION['ID'];
	echo "The user is: " . $user . " and their ID is: " . $ID;
	echo "<br>";
	
	function getGID($someID) {
		$con = mysqli_connect("localhost","webauth","webauth");
		$sel = mysqli_select_db($con, 'CST316');
		$find = "select groupID from groups where ownerID = '".$someID."' or memberID = '".$someID."'";
		$query = mysqli_query($con, $find);
		$fetch = mysqli_fetch_assoc($query); 		//change for multiple groups
			if(!$fetch){
				echo "Error number: " . mysqli_errno($con);
			}
			else {
				echo "success";
				//int $i = 0;
				//echo $fetch[$i];
				//$i = $i + 1;
			}
		
		$gID = $fetch[0];
		$gIDD = $fetch[1];
		echo "<br>";
		echo "You current group folders are: " . $gID . ", " . $gIDD;
		
	}	
	
	getGID($ID);
	
	
	
	
	
	
	///////////////////////////////////Display///////////////////////////////////////////
	/*
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
    $currdir = "./users/$uname";
	$_SESSION['upload'] = $currdir;
	$_SESSION['currentdir'] = $currdir;
	
} 
else 
{
    $currdir = urldecode($_SERVER['QUERY_STRING']);
}
if ($currdir == "./users/$uname") 
 
    $label = "Root";
else 
{
    $path = explode('/', $currdir);
    $label = $path[count($path)-1]; 
}
?>

<!doctype html>
	<img class="user_pic" src="..\users\<?=$uname?>\.set\<?=$uname?>.png">
        <div id="container">
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
			/*
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
			'<td align="center"><form action="" method=""> <input name="checkbox[]" type="checkbox" id="checkbox[]" value=""></form></td>' . "</tr>");
    }
}

*/	
?>	
	
	
</body>
</html>
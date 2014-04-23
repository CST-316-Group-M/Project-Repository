<?php
<<<<<<< HEAD
=======
//comments needed!
>>>>>>> master
		$con = mysqli_connect("localhost","webauth","webauth");
			if(!$con) {
				echo "Could not connect to database.";
				} 
		$sel = mysqli_select_db($con, 'CST316');
			if(!$sel) {
				echo "Could not select database.";
				}


		$sqlQuery = "SELECT * from repo_control WHERE PorP = 0";

        // Execute Query -----------------------------           
        $result = mysqli_query($con, $sqlQuery);
            if(!$result) {
                echo "Cannot do query" . "<br/>";
                exit;
            }else {
                echo "Query Public work" ."<br/>";
            }

          // Display Results -----------------------------

            $num_results=mysqli_num_rows($result);
			echo $num_results;

            for ($i=0; $i<$num_results;$i++){
                $row = mysqli_fetch_assoc ($result);
                echo "<br/>" . "REPO: " . stripslashes($row['R_name']);
            }echo "<br/><br/>";
			
		$sqlQuery = "SELECT * from repo_control WHERE PorP = 1";

        // NEW QUERY!! -----------------------------           
        $result = mysqli_query($con, $sqlQuery);
            if(!$result) {
                echo "Cannot do query" . "<br/>";
                exit;
            }else {
                echo "Query Private work" ."<br/>";
            }

          // Display Results of new Query -----------------------------

            $num_results=mysqli_num_rows($result);
			echo $num_results;

            for ($i=0; $i<$num_results;$i++){
                $row = mysqli_fetch_assoc ($result);
				//$resultb = $row[
                echo "<br/>" . "REPO: " . stripslashes($row['R_name']);
            }echo "<br/><br/>";
			
			
			
			

?>
<title> AHHHH NO WORKY!!!!!! </title>
<H1>
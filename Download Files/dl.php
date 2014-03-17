	<?php
		$f = $_POST['/root System/jtsmit11/Work/offlinerepo.html'];	

		if (file_exists($f)) {
			header('Content-Description: File Transfer');
			header('Content-Type: applicatoin/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($f));			
			readfile($f);
		exit;
	}
	?>

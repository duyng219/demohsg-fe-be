<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$DB = "hsg";
	$ERROR1 = "Loi mysql";
	$ERROR2 = "Loi DB1";
	$conn = mysqli_connect($HOST, $USER, $PASS, $DB);
	mysqli_select_db($conn, $DB) or die($ERROR2);
	mysqli_query($conn,"SET NAMES 'utf8'"); 
?>

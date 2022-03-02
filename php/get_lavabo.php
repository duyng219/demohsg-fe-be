<?php
	
	include ('../connect.php');
	header("Content-Type: application/json; charset=UTF-8");
	$sql="SELECT * FROM lavabo";
	$kq=mysqli_query($conn ,$sql);
	$out = array();
	while ($r = mysqli_fetch_assoc($kq)) {
		$out[($r['TenLavabo'])] = $r;
	}
	echo json_encode($out); 
	
?>
<?php
	
	include ('../connect.php');
	header("Content-Type: application/json; charset=UTF-8");
	$sql="SELECT * FROM ton";
	$kq=mysqli_query($conn ,$sql);
	$out = array();
	while ($r = mysqli_fetch_assoc($kq)) {
		$out[($r['TenTon'])] = $r;
	}
	echo json_encode($out); 
	
?>
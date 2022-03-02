<?php
	
	include ('../connect.php');
	header("Content-Type: application/json; charset=UTF-8");
	$sql="SELECT * FROM maunha 
     JOIN tang on maunha.IdTang=tang.IdTang
	join ton on maunha.IdTon=ton.IdTOn
	join son on maunha.IdSon=son.IdSon
	join gachlatnen on maunha.IdGachLatNen=gachlatnen.IdGachLatNen
	join lavabo on maunha.IdLavabo=lavabo.Idlavabo
	join den on maunha.IdDen=den.IdDen

 ";
	$kq=mysqli_query($conn ,$sql);
	$outp = array();
	while ($r = mysqli_fetch_assoc($kq)) {
		$outp[strtolower($r['IdMauNha'])] = $r;
	}
	echo json_encode($outp); 
	
?>
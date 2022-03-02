<?php
	
	include ('../connect.php');

if(isset($_POST['idmaunhachitiet'])){

	$idmaunhachitiet=$_POST['idmaunhachitiet'];

    $gia_ton=$_POST['gia_ton'];

	$gia_son=$_POST['gia_son'];

	$gia_gachlatnen=$_POST['gia_gachlatnen'];

	$gia_lavabo=$_POST['gia_lavabo'];
	$TenTon=$_POST['TenTon'];
	$TenSon=$_POST['TenSon'];

	$TenGachLatNen=$_POST['TenGachLatNen'];

	$TenLavabo=$_POST['TenLavabo'];
	$sl_ton=$_POST['sl_ton'];
	$sl_son=$_POST['sl_son'];

	$sl_gachlatnen=$_POST['sl_gachlatnen'];

	$sl_lavabo=$_POST['sl_lavabo'];
	
	$sql=" DELETE FROM  maunhachitiet";
	$kq=mysqli_query($conn,$sql);

	
	$sql="INSERT INTO maunhachitiet (idmaunhachitiet,gia_ton,gia_son,gia_gachlatnen,gia_lavabo,TenTon,TenSon,TenGachLatNen,TenLavabo,sl_ton,sl_son,sl_gachlatnen,sl_lavabo) 
	VALUES ('$idmaunhachitiet','$gia_ton','$gia_son','$gia_gachlatnen','$gia_lavabo','$TenTon','$TenSon','$TenGachLatNen','$TenLavabo','$sl_ton','$sl_son','$sl_gachlatnen','$sl_lavabo')";
	$kq=mysqli_query($conn,$sql);
		header("location:index.php");
}

	
	
?>
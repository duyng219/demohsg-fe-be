<?php
	
	include ('../connect.php');

if(isset($_POST['idmaunhachitiet'])){

	$idmaunhachitiet=$_POST['idmaunhachitiet'];

if(isset($_POST['TenLavabo'])){
    $gia_lavabo=$_POST['gia_lavabo'];
	$TenLavabo=$_POST['TenLavabo'];
	$sql="UPDATE maunhachitiet
    SET gia_lavabo = '$gia_lavabo',
	TenLavabo='$TenLavabo'
    WHERE idmaunhachitiet='$idmaunhachitiet'";
	$kq=mysqli_query($conn,$sql);
}
if(isset($_POST['TenGachLatNen'])){
	$gia_gachlatnen=$_POST['gia_gachlatnen'];
	$TenGachLatNen=$_POST['TenGachLatNen'];
	$sql="UPDATE maunhachitiet
    SET gia_gachlatnen = '$gia_gachlatnen',
	TenGachLatNen='$TenGachLatNen'
    WHERE idmaunhachitiet='$idmaunhachitiet'";
	$kq=mysqli_query($conn,$sql);
}
if(isset($_POST['TenSon'])){
	$gia_son=$_POST['gia_son'];
	$TenSon=$_POST['TenSon'];
	$sql="UPDATE maunhachitiet
    SET gia_son = '$gia_son',
	TenSon='$TenSon'
    WHERE idmaunhachitiet='$idmaunhachitiet'";
	$kq=mysqli_query($conn,$sql);
}
if(isset($_POST['TenTon'])){
	
    $gia_ton=$_POST['gia_ton'];
	$TenTon=$_POST['TenTon'];
	$sql="UPDATE maunhachitiet
    SET gia_ton = '$gia_ton',
	TenTon='$TenTon'
    WHERE idmaunhachitiet='$idmaunhachitiet'";
	$kq=mysqli_query($conn,$sql);
}

     
	
		header("location:index.php");
}

	
	
?>
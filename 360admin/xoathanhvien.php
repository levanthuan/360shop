<?php
session_start();
if(isset($_SESSION['tk']) && isset($_SESSION['mk'])){
	include_once('ketnoi.php');
	$id_thanhvien=$_GET['id_thanhvien'];
	$sql="DELETE FROM thanhvien WHERE id_thanhvien='$id_thanhvien'";
	$query=mysql_query($sql);
	header("location:quantri.php?page_layout=thanhvien");
}
else{
	header("location:index.php");
}
?>
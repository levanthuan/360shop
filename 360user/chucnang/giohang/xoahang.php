<?php
	session_start();
	$id_sp = $_GET['id_sp'];
	if($id_sp==0){
		//xóa hết
		unset($_SESSION['giohang']);
	}else{
		//Xóa đơn
		unset($_SESSION['giohang'][$id_sp]);
	}
	//Nếu mảng giỏ hàng không còn -> xóa toàn bộ mảng giỏ hàng
	if(count($_SESSION['giohang'])==0){
		unset($_SESSION['giohang']);
	}
	header('location: ../../index.php?page_layout=giohang');
?>
<?php
	session_start();
	//$_SESSION['giohang'][id_sp] = sl;
	$id_sp = $_GET['id_sp'];
	if(isset($_SESSION['giohang'][$id_sp])){
		//Nếu sản phẩm đã có trong giỏ hàng: số lượng tăng 1 đơn vị
		$_SESSION['giohang'][$id_sp]+=1;
	}else{
		//Nếu sản phẩm chưa có trong giỏ hàng: số lượng bằng 1
		$_SESSION['giohang'][$id_sp] = 1;
	}
	echo $_SESSION['giohang'][$id_sp];
	header('location: ../../index.php?page_layout=giohang');
?>
<?php
ob_start();
session_start();
include_once('ketnoi.php');
if ($_SESSION['tk'] && $_SESSION['mk']) {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>360Shop - Website bán điện thoại</title>
<link rel="stylesheet" type="text/css" href="css/quantri.css" />
<?php
if (isset($_GET['page_layout'])) {
    switch($_GET['page_layout']){
        case 'danhsachsp': echo '<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />';
        break;

        case 'danhsachsp': echo '<link rel="stylesheet" type="text/css" href="css/thanhvien.css" />';
        break;

        case 'themsp': echo '<link rel="stylesheet" type="text/css" href="css/themsp.css" />';
        break;  
        
        case 'suasp': echo '<link rel="stylesheet" type="text/css" href="css/suasp.css" />';
        break;



        default: echo '<link rel="stylesheet" type="text/css" href="css/quantri.css" />';
    }  
}
?>
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="navbar">
        	<ul>
            	<li id="admin-home"><a href="quantri.php">trang chủ quản trị</a></li>

                <li><a href="quantri.php?page_layout=thanhvien">thành viên</a></li>

                <li><a href="quantri.php?page_layout=danhsachsp">sản phẩm</a></li>
                <li><a target="_blank" href="/360user/index.php">xem website</a></li>
            </ul>
            <div id="user-info">
            	<p>Xin chào <span><?php if(isset($_SESSION['tk'])){echo $_SESSION['tk'];}?></span> đã đăng nhập vào hệ thống</p>
                <p><a href="dangxuat.php">Đăng xuất</a></p>
            </div>
        </div>
        <div id="banner">
        	<div id="logo"><a href="quantri.php?page_layout=quantri"><img src="anh/logo1.png" /></a></div>
        </div>
    </div>
    <div id="body">
    <?php
    if (isset($_GET['page_layout'])) {
            switch($_GET['page_layout']){
                case 'danhsachsp': include_once('danhsachsp.php');
                break;
                case 'thanhvien': include_once('thanhvien.php');
                break;
                case 'themsp': include_once('themsp.php');
                break;  
                case 'themthanhvien': include_once('themthanhvien.php');
                break; 
                case 'suasp': include_once('suasp.php');
                break;  
                case 'suathanhvien': include_once('suathanhvien.php');
                break;
                
                
                default: include_once('gioithieu.php');
            }
        }
        else{
            include_once('gioithieu.php');
        }
    ?>
    </div>
    <div id="footer">
    	<div id="footer-info">
        	<h4> 360Shop - Website bán điện thoại lớn nhất hà nội</h4>
            <p><span>Trụ sở 1:</span> Số nhà 13 - ngõ Tự Do - Hai Bà Trưng - Hà Nội | <span>Phone</span> 113 114 115</p>
            <p><span>Trụ sở 2:</span> Số 17 - Tạ Quang Bửu - Hai Bà Trưng - Hà Nội | <span>Hotline</span> 911 912 913</p>
            <p>Bản quyền thuộc 360Shop</p>
        </div>
    </div>
</div>
</body>
</html>
<?php
}
else{
    header("location:index.php");
}
?>

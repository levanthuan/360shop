<link rel="stylesheet" type="text/css" href="css/giohang.css" />

<div class="prd-block">
	<h2>giỏ hàng của bạn</h2>
    <div class="cart">
    <?php
    if(isset($_POST['sl'])){
        foreach ($_POST['sl'] as $id_sp => $sl) {
            if($sl<=0){
                //Nếu số lượng = 0 -> unset sản phẩm từ mảng giỏ hàng
                unset($_SESSION['giohang'][$id_sp]);
                //Nếu số sản phẩm trong giỏ hàng = 0 -> unset giỏ hàng
                if(count($_SESSION['giohang'])==0){
                    unset($_SESSION['giohang']);
                }
            }else{
                //Nếu số lượng > 0 -> gán số lượng = số người dùng nhập vào
                $_SESSION['giohang'][$id_sp] = $sl;
            }
        }
    }
    if(isset($_SESSION['giohang'])){


        //$_SESSION['giohang'][id_sp] = sl
        $arrId = array();

        //Lấy ra id_sp và lưu vào 1 mảng
        foreach ($_SESSION['giohang'] as $id_sp => $so_luong) {
            $arrId[] = $id_sp;
        }
        //Tách mảng đó ra rồi gom vào 1 chuỗi, ngăn cách bởi dấu ','
        $strId = implode(',',$arrId);
        $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId)";
        $query = mysql_query($sql);
        $totalPriceAll = 0;
        ?>
        <form method="post" id="giohang">
    <?php
        while ($row = mysql_fetch_array($query)) {
            $totalPrice = $_SESSION['giohang'][$row['id_sp']]*$row['gia_sp'];
    ?>
    	<table width="100%">
        	<tr>
            	<td class="cart-item-img" width="25%" rowspan="4"><img width="80" height="144" src="quantri/anh/<?php echo $row['anh_sp']?>" /></td>
                <td width="25%">Sản phẩm:</td>
                <td class="cart-item-title" width="50%"><?php echo $row['ten_sp'] ?></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><span><?php echo $row['gia_sp'] ?> VNĐ</span></td>
            </tr>
            <tr>
            	<td>Số lượng:</td>
                <td>
                <!--Số lượng-->
                <input type="text" name="sl[<?php echo $row['id_sp'] ?>]" value="<?php echo $_SESSION['giohang'][$row['id_sp']] ?>" />
                <!--Xóa-->
                (Bỏ mặt hàng này) <a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp'] ?>">X</a></td>
            </tr>
            <tr>
            	<td>Tổng tiền:</td>
                <td><span><?php echo $totalPrice ?> VNĐ</span></td>
            </tr>
        </table>
    <?php
        $totalPriceAll+=$totalPrice;
        }
    ?>
        </form>
        <p>Tổng giá trị giỏ hàng là: <span><?php echo $totalPriceAll ?> VNĐ</span></p>
        <p class="update-cart"><a href="#" onclick="document.getElementById('giohang').submit()"><span>cập nhật giỏ hàng</span></a></p>
        <p><a href="index.php">Bổ sung sản phẩm</a> <span>•</span> <a href="chucnang/giohang/xoahang.php?id_sp=0">Xóa hết sản phẩm</a> <span>•</span> <a href="index.php?page_layout=muahang">Dừng mua và Thanh toán</a></p>
    <?php
        }else{
            echo '</br>';
            echo '<span style="font-weight:bold;font-size:20px;">Giỏ hàng rỗng</span>';
        }
    ?>
    </div>
</div>

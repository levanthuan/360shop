<script type="text/javascript" language='javascript'>
    function xoaThanhVien() {
        var conf=confirm('Bạn có chắc chắn muốn xóa sản phẩm không');
        return conf;
    }
</script>

<?php
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $soHienThi=10;
    $vitribatdau=$page*$soHienThi - $soHienThi;
	
    $sql ="SELECT * FROM thanhvien";

    $query=mysql_query($sql);

    $soThanhVien=mysql_num_rows(mysql_query("SELECT * FROM thanhvien"));
    $soTrang=ceil($soThanhVien/$soHienThi);
    $danhsachTrang='';
    for($i=1;$i <= $soTrang;$i++){
        if($page==$i){
            $danhsachTrang.='<span>'.$i.'<span> ';
        }
        else{
            $danhsachTrang.='<a href="quantri.php?page_layout=thanhvien&page='.$i.'">'.$i.'<a> ';
        }
    }
?>

<h2>quản lý thành viên</h2>
<div id="main">
    <p id="add-prd"><a href="quantri.php?page_layout=themthanhvien" style="text-decoration:none; font-size:15px;background:red;text-transform: uppercase; color:white;
font-weight: bold;"><span>Thêm thành viên mới</span></a></p>
</br>
    <table id="prds" border="1" cellpadding="0" cellspacing="0" width="100%">
        <tr id="prd-bar" style="text-align:center">
            <td width="5%" height="30px">ID</td>
            <td width="40%">Account</td>
            <td width="5%">Edit</td>
            <td width="5%">Delete</td>
        </tr>
       <?php
       while ($row=mysql_fetch_array($query)) {
       ?>
        <tr style="text-align:center">
            <td><span><?php echo $row['id_thanhvien'];?></span></td>
            <td class="l5"><?php echo $row['tai_khoan']; ?></td>
            <td><a href="quantri.php?page_layout=suathanhvien&id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoaThanhVien();" href="xoathanhvien.php?id_thanhvien=<?php echo $row['id_thanhvien'];?>"><span>Xóa</span></a></td>
        </tr>
         <?php
            }
         ?>
    </table>
    <!-- <p id="pagination"><?php echo $danhsachTrang; ?></p> -->
</div>
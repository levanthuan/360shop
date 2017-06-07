<script type="text/javascript" language='javascript'>
    function xoaSanPham() {
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
$spHienThi=10;
$vitribatdau=$page*$spHienThi - $spHienThi;
$sql="SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm ORDER BY id_sp ASC LIMIT $vitribatdau,$spHienThi";
$query=mysql_query($sql);
$soSanPham=mysql_num_rows(mysql_query("SELECT * FROM sanpham"));
$soTrang=ceil($soSanPham/$spHienThi);
$danhsachTrang='';
for($i=1;$i <= $soTrang;$i++){
	if($page==$i){
		$danhsachTrang.='<span>'.$i.'<span> ';
	}
	else{
		$danhsachTrang.='<a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'<a> ';
	}
}
?>

<h2>quản lý sản phẩm</h2>
<div id="main">
	<p id="add-prd"><a href="quantri.php?page_layout=themsp"><span>thêm sản phẩm mới</span></a></p>
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="40%">Tên sản phẩm</td>
            <td width="15%">Giá</td>
            <td width="20%">Nhà cung cấp</td>
            <td width="10%">Ảnh mô tả</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
       <?php
       while ($row=mysql_fetch_array($query)) {
       ?>
        <tr>
        	<td><span><?php echo $row['id_sp'];?></span></td>
            <td class="l5"><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp'];?></a></td>
            <td class="l5"><span class="price"><?php echo $row['gia_sp']; ?></span></td>
            <td class="l5"><?php echo $row['ten_dm']; ?></td>
            <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_sp'] ;?>" /></span></td>
            <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><span>Sửa</span></a></td>
            <td><a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row['id_sp'];?>"><span>Xóa</span></a></td>
        </tr>
		 <?php
            }
         ?>
    </table>
    <p id="pagination"><?php echo $danhsachTrang; ?></p>
</div>

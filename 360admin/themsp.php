<?php
$sqlDm='SELECT * FROM dmsanpham';
$query=mysql_query($sqlDm);
if(isset($_POST['submit'])){
    if($_POST['ten_sp'] ==''){
        $error_ten_sp='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $ten_sp=$_POST['ten_sp'];
    }

     if($_POST['gia_sp'] ==''){
        $error_gia_sp='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $gia_sp=$_POST['gia_sp'];
    }

     if($_POST['bao_hanh'] ==''){
        $error_bao_hanh='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $bao_hanh=$_POST['bao_hanh'];
    }

     if($_POST['phu_kien'] ==''){
        $error_phu_kien='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $phu_kien=$_POST['phu_kien'];
    }

     if($_POST['tinh_trang'] ==''){
        $error_tinh_trang='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $tinh_trang=$_POST['tinh_trang'];
    }

     if($_POST['khuyen_mai'] ==''){
        $error_khuyen_mai='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $khuyen_mai=$_POST['khuyen_mai'];
    }

     if($_POST['trang_thai'] ==''){
        $error_trang_thai='<span style="color:red;">  Không được để trống<span>';
    }
    else {
        $trang_thai=$_POST['trang_thai'];
    }

     if($_POST['chi_tiet_sp'] ==''){
        $error_chi_tiet_sp='<span style="color:red;">Không được để trống<span>';
    }
    else {
        $chi_tiet_sp=$_POST['chi_tiet_sp'];
    }
    if($_POST['id_dm']=='unselect'){
        $error_id_dm='<span style="color:red;">Không được để trống<span>';
    }
    else{
        $id_dm=$_POST['id_dm'];
    }
    if($_FILES['anh_sp']['name']==''){
         $error_anh_sp='<span style="color:red;">Không được để trống<span>';
    }
    else{
        $anh_sp=$_FILES['anh_sp']['name'];
        $tmp_name=$_FILES['anh_sp']['tmp_name'];
    }
    $dac_biet=$_POST['dac_biet'];
    if(isset($ten_sp) && isset($anh_sp) && isset($gia_sp) && isset($bao_hanh) && isset($phu_kien) && isset($tinh_trang) && isset($khuyen_mai) && isset($trang_thai) && isset($dac_biet) && isset($chi_tiet_sp)){
        move_uploaded_file($tmp_name,'anh/'.$anh_sp);
    $sql2="INSERT INTO sanpham(ten_sp, gia_sp, bao_hanh, phu_kien, tinh_trang, khuyen_mai, trang_thai, chi_tiet_sp, anh_sp, id_dm, dac_biet) 
    VALUES('$ten_sp', '$gia_sp', '$bao_hanh', '$phu_kien', '$tinh_trang', '$khuyen_mai', '$trang_thai', '$chi_tiet_sp', '$anh_sp', '$id_dm', '$dac_biet')";
    $query2=mysql_query($sql2);
    header("location:quantri.php?page_layout=danhsachsp");
}
}
?>      
        <h2>thêm mới sản phẩm</h2>
		<div id="main">
        	<form method="post" enctype="multipart/form-data">
        	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" /><?php if(isset($error_ten_sp)){ echo $error_ten_sp;}?></td>
                </tr>
                <tr>
                	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /><?php if(isset($error_anh_sp)){ echo $error_anh_sp;}?></td>
                </tr>
                <tr>
                	<td><label>Nhà cung cấp</label><br />
                    	<select name="id_dm">
                        	<option value="unselect" selected="selected">Lựa chọn nhà cung cấp</option>
                            <?php
                            while ($row=mysql_fetch_array($query)) {
                            ?>
                            <option value=<?php echo $row['id_dm'];?>><?php echo $row['ten_dm'];?></option>
                          <?php
                            }
                          ?>
                        </select>
                        <?php if(isset($error_id_dm)){ echo $error_id_dm;}?>	
                    </td>
                </tr>
                <tr>
                	<td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" /> VNĐ<?php if(isset($error_gia_sp)){ echo $error_gia_sp;}?></td>
                </tr>
                <tr>
                	<td><label>Bảo hành</label><br /><input type="text" name="bao_hanh" value="12 Tháng" /><?php if(isset($error_bao_hanh)){ echo $error_bao_hanh;}?></td>
                </tr>
                <tr>
                	<td><label>Đi kèm</label><br /><input type="text" name="phu_kien" value="Hộp, sách, sạc, cáp, tai nghe" /><?php if(isset($error_phu_kien)){ echo $error_phu_kien;}?></td>
                </tr>
                <tr>
                	<td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="Máy Mới 100%" /><?php if(isset($error_tinh_trang)){ echo $error_tinh_trang;}?></td>
                </tr>
                <tr>
                	<td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="Dán Màn Hình 3 lớp" /><?php if(isset($error_khuyen_mai)){ echo $error_khuyen_mai;}?></td>
                </tr>
                <tr>
                	<td><label>Còn hàng</label><br /><input type="text" name="trang_thai" value="Còn hàng" /><?php if(isset($error_trang_thai)){ echo $error_trang_thai;}?></td>
                </tr>
                <tr>
                	<td><label>Sản phẩm đặc biệt</label><br />Có <input type="radio" name="dac_biet" value=1 /> Không <input checked="checked" type="radio" name="dac_biet" value=0 /></td>
                </tr>
                <tr>
                	<td><label>Thông tin chi tiết sản phẩm</label><br />
                    <?php 
                     include("fckeditor/fckeditor.php");
                        $sBasePath=$_SERVER['PHP_SELF'];
                        $sBasePath=substr($sBasePath,0, strpos($sBasePath, 'quantri.php'));
                        $sBasePath=$sBasePath.'fckeditor/';
                        $oFCKeditor= new FCKeditor('chi_tiet_sp');
                        $oFCKeditor -> BasePath =$sBasePath;
                        $oFCKeditor-> Create();
                    ?>
                    <?php if(isset($error_chi_tiet_sp)){ echo $error_chi_tiet_sp;}?></td>
                </tr>
                <tr>
                	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
    	</div>
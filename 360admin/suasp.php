<?php
$id_sp=$_GET['id_sp'];
$sqlDm="SELECT * FROM dmsanpham";
$query=mysql_query($sqlDm);
$sqlsp="SELECT * FROM sanpham WHERE id_sp='$id_sp'";
$querysp=mysql_query($sqlsp);
$rowSp=mysql_fetch_array($querysp);
if(isset($_POST['submit'])){
    if($_POST['ten_sp']==''){
        $error_ten_sp='<span style="color:red;">(*)<span>';
    }
    else{
        $ten_sp=$_POST['ten_sp'];
    }

     if($_POST['gia_sp']==''){
        $error_gia_sp='<span style="color:red;">(*)<span>';
    }
    else{
        $gia_sp=$_POST['gia_sp'];
    }

     if($_POST['bao_hanh']==''){
        $error_bao_hanh='<span style="color:red;">(*)<span>';
    }
    else{
        $bao_hanh=$_POST['bao_hanh'];
    }

     if($_POST['phu_kien']==''){
        $error_phu_kien='<span style="color:red;">(*)<span>';
    }
    else{
        $phu_kien=$_POST['phu_kien'];
    }

     if($_POST['tinh_trang']==''){
        $error_tinh_trang='<span style="color:red;">(*)<span>';
    }
    else{
        $tinh_trang=$_POST['tinh_trang'];
    }

     if($_POST['khuyen_mai']==''){
        $error_khuyen_mai='<span style="color:red;">(*)<span>';
    }
    else{
        $khuyen_mai=$_POST['khuyen_mai'];
    }

     if($_POST['trang_thai']==''){
        $error_trang_thai='<span style="color:red;">(*)<span>';
    }
    else{
        $trang_thai=$_POST['trang_thai'];
    }

     if($_POST['chi_tiet_sp']==''){
        $error_chi_tiet_sp='<span style="color:red;">(*)<span>';
    }
    else{
        $chi_tiet_sp=$_POST['chi_tiet_sp'];
    }
    $dac_biet=$_POST['dac_biet'];
    $id_dm=$_POST['id_dm'];
    if ($_FILES['anh_sp']['name']=='') {
        $anh_sp=$_POST['anh_sp'];
    }
    else{
        $anh_sp=$_FILES['anh_sp']['name'];
        $tmp_name=$_FILES['anh_sp']['tmp_name'];
    }
    if(isset($ten_sp) && isset($gia_sp) && isset($bao_hanh) && isset($phu_kien) && isset($tinh_trang) && isset($khuyen_mai) && isset($trang_thai) && isset($chi_tiet_sp)){
        $uploadFile=move_uploaded_file($tmp_name,'anh/'.$anh_sp);
        $sqlUd="UPDATE sanpham SET id_dm='$id_dm', anh_sp='$anh_sp', ten_sp='$ten_sp', gia_sp='$gia_sp', bao_hanh='$bao_hanh', phu_kien='$phu_kien', tinh_trang='$tinh_trang', trang_thai='$trang_thai', khuyen_mai='$khuyen_mai', dac_biet='$dac_biet', chi_tiet_sp='$chi_tiet_sp' WHERE id_sp='$id_sp'";
        $queryUd=mysql_query($sqlUd);
        header("location:quantri.php?page_layout=danhsachsp");
    }
}

?>
  <h2>sửa thông tin sản phẩm</h2>
		<div id="main">
        	<form method="post" enctype="multipart/form-data">
        	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td><label>Tên sản phẩm</label><br /><input type="text" name="ten_sp" value="<?php if (isset($ten_sp)) {echo
                        $ten_sp;
                    } else{echo $rowSp['ten_sp'] ;}?>" /><?php if(isset($error_ten_sp)){echo $error_ten_sp;} ?></td>
                </tr>
                <tr>
                	<td><label>Ảnh mô tả</label><br /><input type="file" name="anh_sp" /><input type="hidden" name="anh_sp" value="<?php echo $rowSp['anh_sp'];?>"></td>
                </tr>
                <tr>
                	<td><label>Nhà cung cấp</label><br />
                    	<select name="id_dm">
                        <?php
                        while ($rowDm=mysql_fetch_array($query)) {
                        ?>
                            <option <?php if($rowSp['id_dm']==$rowDm['id_dm']){echo "selected='selected'";}?> value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?></option>
                        <?php
                        }
                        ?>
                        </select>	
                    </td>
                </tr>
                <tr>
                	<td><label>Giá sản phẩm</label><br /><input type="text" name="gia_sp" value="<?php if (isset($gia_sp)) {echo
                        $gia_sp;
                    } else{echo $rowSp['gia_sp'];}?>" /> VNĐ<?php if(isset($error_gia_sp)){echo $error_gia_sp;} ?></td>
                </tr>
                <tr>
                	<td><label>Bảo hành</label><br /><input type="text" name="bao_hanh" value="<?php if (isset($bao_hanh)) {echo
                        $bao_hanh;
                    } else{echo $rowSp['bao_hanh'];}?>" /><?php if(isset($error_bao_hanh)){echo $error_bao_hanh;} ?></td>
                </tr>
                <tr>
                	<td><label>Đi kèm</label><br /><input type="text" name="phu_kien" value="<?php if (isset($phu_kien)) {echo
                        $phu_kien;
                    } else{echo $rowSp['phu_kien'];}?>" /><?php if(isset($error_phu_kien)){echo $error_phu_kien;} ?></td>
                </tr>
                <tr>
                	<td><label>Tình trạng</label><br /><input type="text" name="tinh_trang" value="<?php if (isset($tinh_trang)) {echo
                        $tinh_trang;
                    } else{echo $rowSp['tinh_trang'];}?>" /><?php if(isset($error_tinh_trang)){echo $error_tinh_trang;} ?></td>
                </tr>
                <tr>
                	<td><label>Khuyến mại</label><br /><input type="text" name="khuyen_mai" value="<?php if (isset($khuyen_mai)) {echo
                        $khuyen_mai;
                    } else{ echo $rowSp['khuyen_mai'];}?>" /><?php if(isset($error_khuyen_mai)){echo $error_khuyen_mai;} ?></td>
                </tr>
                <tr>
                	<td><label>Còn hàng</label><br /><input type="text" name="trang_thai" value="<?php if (isset($trang_thai)) {echo
                        $trang_thai;
                    } else{echo $rowSp['trang_thai'];}?>" /><?php if(isset($error_trang_thai)){echo $error_trang_thai;} ?></td>
                </tr>
                <tr>
                	<td><label>Sản phẩm đặc biệt</label><br />Có <input <?php if($rowSp['dac_biet']==1){echo "checked='checked'";}?> type="radio" name="dac_biet" value=1 /> Không <input <?php if($rowSp['dac_biet']==0){echo "checked='checked'";}?> type="radio" name="dac_biet" value=0 /></td>
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
                        if(isset($_POST['chi_tiet_sp'])){
                            $oFCKeditor -> Value = $_POST['chi_tiet_sp'];
                        }
                        else{
                            $oFCKeditor -> Value = $rowSp['chi_tiet_sp'];
                        }
                        $oFCKeditor-> Create();

                    ?>
                    <?php if(isset($error_chi_tiet_sp)){echo $error_chi_tiet_sp;} ?></td>
                </tr>
                <tr>
                	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
                </tr>
            </table>
            </form>
    	</div>
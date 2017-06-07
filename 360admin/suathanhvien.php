<?php
$id_thanhvien=$_GET['id_thanhvien'];
$sqlDm="SELECT * FROM thanhvien";
$query=mysql_query($sqlDm);
$sqlsp="SELECT * FROM thanhvien WHERE id_thanhvien='$id_thanhvien'";
$querysp=mysql_query($sqlsp);
$rowSp=mysql_fetch_array($querysp);
if(isset($_POST['submit'])){
    if($_POST['tai_khoan']==''){
        $error_tai_khoan='<span style="color:red;">Không được để trống!<span>';
    }
    else{
        $tai_khoan=$_POST['tai_khoan'];
    }

     if($_POST['mat_khau']==''){
        $error_mat_khau='<span style="color:red;">Không được để trống<span>';
    }
    else{
        $mat_khau=$_POST['mat_khau'];
    }

    if(isset($tai_khoan) && isset($mat_khau) ){
        $sqlUd="UPDATE thanhvien SET id_thanhvien='$id_thanhvien',tai_khoan='$tai_khoan',mat_khau='$mat_khau' WHERE id_thanhvien='$id_thanhvien'";
        $queryUd=mysql_query($sqlUd);
        header("location:quantri.php?page_layout=thanhvien");
    }
}

?>
  
  <h2>sửa thông tin sản phẩm</h2>
		<div id="main">
        	<form method="post" enctype="multipart/form-data">
        	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
            	<tr>
                	<td><label>Account</label><br /><input type="text" name="tai_khoan" value="<?php if (isset($tai_khoan)) {echo
                        $tai_khoan;
                    } else{echo $rowSp['tai_khoan'] ;}?>" /><?php if(isset($error_tai_khoan)){echo $error_tai_khoan;} ?></td>
                </tr>

                <tr>
                    <td><label>Password</label><br /><input type="pass" name="mat_khau" value="<?php if (isset($mat_khau)) {echo
                        $mat_khau;
                    } else{echo $rowSp['mat_khau'] ;}?>" /><?php if(isset($error_mat_khau)){echo $error_mat_khau    ;} ?></td>
                </tr>
                <tr>
                	<td><input type="submit" name="submit" value="Edit" /> <input type="reset" name="reset" value="Reset" /></td>
                </tr>
            </table>
            </form>
    	</div>
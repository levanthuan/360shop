
        <?php
            $sql='SELECT * FROM thanhvien';
            $query=mysql_query($sql);
            if(isset($_POST['submit'])){
                
            if($_POST['tai_khoan'] ==''){
                $error_tai_khoan='<span style="color:red;">Không được để trống !<span>';
            }
            else {
                $tai_khoan=$_POST['tai_khoan'];
            }
            if($_POST['mat_khau'] ==''){
                $error_mat_khau='<span style="color:red;">Không được để trống !<span>';
            }
            else {
                $mat_khau=$_POST['mat_khau'];
            }


            if(isset($tai_khoan) && isset($mat_khau)){
                $sql2="INSERT INTO thanhvien(tai_khoan,mat_khau) 
                VALUES('$tai_khoan', '$mat_khau')";
                $query2=mysql_query($sql2);
                header("location:quantri.php?page_layout=thanhvien");
            }
        }
        ?>

           
            
        <h2>thêm thành viên mới</h2>
        <div id="main">
            <form method="post" enctype="multipart/form-data">
            <table id="add-prd" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td><label>Tài Khoản</label><br /><input type="text" name="tai_khoan" /><?php if(isset($error_tai_khoan)){ echo $error_tai_khoan;}?></td>
                </tr>

                <tr>
                    <td><label>Mật Khẩu</label><br /><input type="password" name="mat_khau" /><?php if(isset($error_mat_khau)){ echo $error_mat_khau;}?></td>
                </tr>
                </br>
                <tr>
                    <td><input type="submit" name="submit" value="Add new" /> <input type="reset" name="reset" value="Reset" /></td>
                </tr>
            </table>
            </form>
        </div>
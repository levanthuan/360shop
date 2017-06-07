<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />

<div class="prd-block">
	<h2><?php
        $ten_dm = $_GET['ten_dm'];
        echo $ten_dm;
    ?></h2>
    <div class="pr-list">
    <?php
        $id_dm = $_GET['id_dm'];
        //Số bản ghi trên trang
        $rowPerPage = 3;
        //Số trang
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        //Vị trí bản ghi lấy ra
        $perRow = $page*$rowPerPage-$rowPerPage;
        //vitri = trang*soluong-soluong
        $sql = "SELECT * FROM sanpham WHERE id_dm = $id_dm LIMIT $perRow,$rowPerPage";
        $query = mysql_query($sql);
        //Tổng bản ghi lấy ra
        $totalRow = mysql_num_rows(mysql_query("SELECT * FROM sanpham WHERE id_dm = $id_dm"));
        //Tổng số trang
        $totalPage = ceil($totalRow/$rowPerPage);
        //Thanh phân trang
        $listPage = '';
        if($page>1){
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&ten_dm='.$ten_dm.'&page=1"> First </a>';
            $prev = $page-1;
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&ten_dm='.$ten_dm.'&page='.$prev.'"> << </a>';
        }
        for($i=1;$i<=$totalPage;$i++){
            if($i==$page){
                $listPage .= '<span> '.$i.' </span>';
            }else{
                $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&ten_dm='.$ten_dm.'&page='.$i.'"> '.$i.' </a>';
            }
        }

        if($page<$totalPage){
            $next = $page+1;
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&ten_dm='.$ten_dm.'&page='.$next.'"> >> </a>';
            $listPage .= '<a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&ten_dm='.$ten_dm.'&page='.$totalPage.'"> Last </a>';
        }
        $i=0;
        while ($row = mysql_fetch_array($query)) {
    ?>
    	<div class="prd-item">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="80" height="144" src="../360admin/anh/<?php echo $row['anh_sp'] ?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp'] ?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh'] ?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang'] ?></p>
            <p class="price"><span>Giá: <?php  echo $row['gia_sp'] ?> VNĐ</span></p>
        </div>
    <?php
        $i++;
        if($i%3==0){
            echo '<div class="clear"></div>';
        }
        }
    ?>
        <div class="clear"></div>
    </div>
</div>

<div id="pagination"><?php echo $listPage ?></div>

<div class="l-sidebar">
	<h2>thống kê truy cập</h2>
    <div id="counter">
    <?php
    	$fp = 'chucnang/thongke/counter.txt';
    	$fo = fopen($fp,'r');
    	$fr = fread($fo,filesize($fp));
    	$fc = fclose($fo);
    	$fr++;
    	$fo = fopen($fp,'w');
    	$fw = fwrite($fo,$fr);
    	$fc = fclose($fo);

    	
    ?>
    	<p>Đã có <span><?php echo $fr ?></span> lượt ghé thăm</p>
    </div>
</div>
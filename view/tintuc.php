<?php
include 'layout.php';
include "../model/data.php";
include "../model/tintucdata.php";
?>
<div class="container" style="text-align: center;color: #123abc">
<h1>Tin tức - sự kiện</h1>
<h4>Cập nhật thông tin thường xuyên</h4>
</div>
<div class="container panel panel-info" style="height: 800px">
	<h3>Bồi dưỡng văn hóa- Luyện thi đại học</h3>
        <?php
        $ds1=getDanhsachtintuc1();
        foreach ($ds1 as $value) {
        ?>
            <a href="tintucdetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  			<h3>Lớp nghiệp vụ xây dựng</h3>
  			<?php
        $ds1=getDanhsachtintuc2();
        foreach ($ds1 as $value) {
        ?>
            <a href="tintucdetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  			<h3>Xây dựng</h3>
  			<?php
        $ds1=getDanhsachtintuc3();
        foreach ($ds1 as $value) {
        ?>
            <a href="tintucdetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
</div>

<?php
include 'footer.php';
?>
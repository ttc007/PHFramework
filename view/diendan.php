<?php
include 'layout.php';
include "../model/data.php";
include "../model/diendandata.php";
?>
<div class="container" style="text-align: center;color: #123abc">
<h1>Chào mừng bạn đến với diễn đàn học tập của Tâm Trí Việt Cồ</h1>
<h5><i>Tâm trí Việt Cồ - Nơi giao lưu học tập của các bạn trẻ!</i></h5>
</div>
<div class="container panel panel-info" style="min-height: 800px">
	<h3 style="color: #23a4567">Bồi dưỡng văn hóa- Luyện thi đại học</h3>
        <?php
        $ds1=getchude1();
        foreach ($ds1 as $value) {
        ?>
            <a href="chudedetail.php?id=<?php echo $value[0]?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  			<h3 style="color: #3a45678">Lớp nghiệp vụ xây dựng</h3>
  			<?php
        $ds1=getchude2();
        foreach ($ds1 as $value) {
        ?>
            <a href="chudedetail.php?id=<?php echo $value[0]?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
  			<h3 style="color: #a456789">Xây dựng</h3>
  			<?php
        $ds1=getchude3();
        foreach ($ds1 as $value) {
        ?>
            <a href="chudedetail.php?id=<?php echo $value[0];?>"><?php echo $value[1]?></a><span class="pull-right"> Ngày đăng:<?php echo $value[4]?></span><br>
        <?php
        }
        ?>
</div>

<?php
include 'footer.php';
?>
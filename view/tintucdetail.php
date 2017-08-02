<?php
include 'layout.php';
include "../model/data.php";
include "../model/tintucdata.php";
$id=filter_input(INPUT_GET, "id");
$chude=gettintucchitiet($id);
?>
<div class="container" style="text-align: center;color: #123abc">
<h1><?php echo $chude[1]?></h1>
<h5><i>Tâm trí Việt Cồ - Nơi giao lưu học tập của các bạn trẻ!</i></h5>
</div>
<div class="container panel panel-info" style="min-height: 800px;">
	<?php echo $chude[2]?>
</div>

<?php
include 'footer.php';
?>
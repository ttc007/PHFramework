<?php
include "admin.php";
include ("../../model/dangkihocdata.php");

    $danhsachs=getDangkihocNew();
    $action = filter_input(INPUT_GET, "action");
    if($action=="daxem") {
    	$id=filter_input(INPUT_GET, "id");
    	changeStatusDangkihoc($id);
    	header("Location:index.php");
    }
?>
<div class="container">
	<div class="panel panel-info">
		<h1>Danh sách đăng kí mới</h1>
		<table class="table">
		<tr>
			<td>ID</td>
			<td>Tên học viên</td>
			<td>Phone</td>
			<td>Địa chỉ</td>
			<td>Môn học</td>
			<td>Suất</td>
			<td>Thời gian</td>
			<td>Ngày đăng kí</td>
			<td>Trạng thái</td>
			<td></td>
		</tr>

		<?php
			foreach ($danhsachs as $danhsach) {
		?>
		<tr>
			<td><?php echo $danhsach[0]?></td>
			<td><?php echo $danhsach[1]?></td>
			<td><?php echo $danhsach[2]?></td>
			<td><?php echo $danhsach[3]?></td>
			<td><?php echo $danhsach[4]?></td>
			<td><?php echo $danhsach[5]?></td>
			<td><?php echo $danhsach[6]?></td>
			<td><?php echo $danhsach[7]?></td>
			<td>Mới</td>
			<td><a href="?action=daxem&id=<?php echo $danhsach[0]?>">Check</a></td>
		</tr>
		<?php
			}
		?>
		
	</table>
	</div>
</div>
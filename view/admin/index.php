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
		<h1 style="color: #123abc">Welcom Admin!</h1>
		<h4 style="color: #abc123">Hãy kiểm tra các thông tin học viên đăng kí mới</h4>
		<h2 style="color: #123abc">Danh sách học viên đăng kí mới</h2>
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
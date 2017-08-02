<?php
include "admin.php";
include "../../model/dangkihocdata.php";
$action = filter_input(INPUT_GET, "action");
$danhsachs=getDanhsachDangkis();
if($action=="daxeplop") {
    	$id=filter_input(INPUT_GET, "id");
    	changeStatusDangkihoc2($id);
    	header("Location:danhsachdangki.php");
    }
?>
<div class="container">
<h1>Danh sách học viên đăng kí</h1>
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
			<td><?php if($danhsach[8]==1)echo "<h4>Chưa xếp lớp</h4>"; else echo "Đã xếp lớp";?></td>
			<td><a href="?action=daxeplop&id=<?php echo $danhsach[0]; ?>"><?php if($danhsach[8]==1)echo "Check xếp lớp";?></a></td>
		</tr>
		<?php
			}
		?>
		
	</table>
	
</div>
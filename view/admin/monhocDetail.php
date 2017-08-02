<?php
include "admin.php";

$id = filter_input(INPUT_GET, 'id');
if ($id=="") $id=filter_input(INPUT_POST, 'id');
$monhoc = getMonhoc($id);
?>
<div class="container">
	<h1><?php echo "$monhoc[1]"; ?> Management</h1>
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm 1 chương</button>
	  <div id="demo" class="collapse">
		<form action="?action=add" method="post">
			Name
			<br>
			<input type="text" name="name">
			<br><br>
			Content<br>
			<input type="hidden" name="id" value="<?php echo $monhoc[0]; ?>">
			<textarea name="content" id="editor1" rows="10" cols="80"></textarea>
			<script>
			    CKEDITOR.replace( 'editor1' );
			</script>
			<br><br>
			Bài tập<br>
			<textarea name="baitap" id="editor3" rows="10" cols="80"></textarea>
			<script>
			    CKEDITOR.replace( 'editor3' );
			</script>
			<br>
			<button>Add</button>
		</form>
	  </div>

		<?php
			global $db;
			$action=filter_input(INPUT_GET, 'action');
			if($action=="") $action=filter_input(INPUT_POST, 'action');

			if($action=="add") {
				$name=filter_input(INPUT_POST, 'name');
				$content=filter_input(INPUT_POST, 'content');
				$baitap=filter_input(INPUT_POST, 'baitap');
				$monhocId=filter_input(INPUT_POST, 'id');
				addChuong($name,$content,$baitap,$monhocId);
			}
			if($action=="delete") {
				$idChuong=filter_input(INPUT_GET, 'idChuong');
				deleteChuong($idChuong);
	            header("Location:monhocDetail.php?id=$id");
			}
			if($action=="edit") {
				$idChuong=filter_input(INPUT_GET, 'idChuong');
			}
			// if($action=="Save") {
				
			// }
			
		?>
	
	<h3>Danh sách chương</h3>
	<div>
		<?php
			$rows = getChuongs($monhoc[0]);
		?>
			<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td></td>
				<td>Content</td>
				<td>Bài tập</td>
				
			</tr>
		<?php
			foreach ($rows as $chuyenmuc) {
		?>
			<tr>
				<td><?php echo $chuyenmuc[0]; ?></td>
				<td><?php echo $chuyenmuc[1]; ?><br><a href="chuongDetail.php?idChuong=<?php echo $chuyenmuc[0]; ?>">Trắc nghiệm</a></td>
						<td>
						<button type="button" data-toggle="modal" data-target="#<?php echo $chuyenmuc[0]; ?>">Delete</button>
						  <div class="modal fade" id="<?php echo $chuyenmuc[0]; ?>" role="dialog">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Bạn có chắc muốn xóa chương này</h4>
						        </div>
						        <div class="modal-body">
						          <p>Chương:<?php echo $chuyenmuc[1]; ?></p>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default"><a href="?action=delete&id=<?php echo $id; ?>&idChuong=<?php echo $chuyenmuc[0]; ?>">Yes</a></button>
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div>
						<a href="editchuong.php?action=edit&id=<?php echo $chuyenmuc[0]; ?>"><button>Edit</button></a></td>

						<td><?php echo $chuyenmuc[2]; ?></td>
						<td><?php echo $chuyenmuc[3]; ?></td>
				

			</tr>
		<?php
			}
		?>
		</table>
	</div>
</div>
</body>
</html>
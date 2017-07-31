<?php
include "admin.php";
include "../../model/monhocData.php";

$idChuong = filter_input(INPUT_GET, 'idChuong');
if ($idChuong=="") $idChuong=filter_input(INPUT_POST, 'idChuong');
$chuong = getChuong($idChuong);
?>
<div class="container">
	<h1>Chương <?php echo "$chuong[1]"; ?> Management</h1>
	<h3>Thêm 1 câu trắc nghiệm</h3>
	<form action="?action=add" method="post">
		Content<br>
		<input type="hidden" name="idChuong" value="<?php echo $idChuong; ?>">
		<textarea name="content" id="editor1" rows="10" cols="80"></textarea>
		<script>
		    CKEDITOR.replace( 'editor1' );
		</script>
		<br><br>
		Đáp án A<br>
		<input type="text" name="daA"><br>
		Đáp án B<br>
		<input type="text" name="daB"><br>
		Đáp án C<br>
		<input type="text" name="daC"><br>
		Đáp án D<br>
		<input type="text" name="daD"><br>
		Đáp án chính xác<br>
		<input type="text" name="daCX">
		<br><br>
		<button>Add</button>
		<?php
			global $db;
			$action=filter_input(INPUT_GET, 'action');
			if($action=="") $action=filter_input(INPUT_POST, 'action');
			if($action=="add") {
				$content=filter_input(INPUT_POST, 'content');
				// $chuongId=filter_input(INPUT_POST, 'chuongId');
				$daA=filter_input(INPUT_POST, 'daA');
				$daB=filter_input(INPUT_POST, 'daB');
				$daC=filter_input(INPUT_POST, 'daC');
				$daD=filter_input(INPUT_POST, 'daD');
				$daCX=filter_input(INPUT_POST, 'daCX');
				addTracnghiem($content,$daA,$daB,$daC,$daD,$daCX,$idChuong);
				// addTracnghiem($content,$daA,$idChuong);
				header("Location:chuongDetail.php?idChuong=$idChuong");
			}
			if($action=="delete") {
				$idChuong=filter_input(INPUT_GET, 'idChuong');
				deleteChuong($idChuong);
	            header("Location:monhocDetail.php?id=$id");
			}
			if($action=="edit") {
				$idChuong=filter_input(INPUT_GET, 'idChuong');
			}
			if($action=="Save") {
				$idChuong=filter_input(INPUT_POST, 'idChuong');
				$name=filter_input(INPUT_POST, 'name');
				$content=filter_input(INPUT_POST, 'content');
				$q="UPDATE chuong
				SET name = :name, content = :content
				WHERE id=:id;";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$idChuong);
	            $statement->bindValue(':name',$name);
	            $statement->bindValue(':content',$content);
	            $statement->execute();
	            header("Location:monhocDetail.php?id=$id");
			}
			
		?>
	</form>
	<h3>Danh sách chương</h3>
	<div>
		<?php
			$rows = getTracnghiems($idChuong);
		?>
			<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Content</td>
				<td></td>
				<td></td>
			</tr>
		<?php
			foreach ($rows as $chuyenmuc) {
		?>
			
				
				<tr>
					<td><?php echo $chuyenmuc[0]; ?></td>
					<?php 
						if(($action=="edit")&&($idChuong==$chuyenmuc[0])) {
					?>
						<form action="monhocDetail.php" method="post">
						<td><input type="text" name="name" value="<?php echo $chuyenmuc[1]; ?>"></td>
						<td>
						<textarea name="content" id="editor2" rows="10" cols="80" value="<?php echo $chuyenmuc[2]; ?>"><?php echo $chuyenmuc[2]; ?></textarea>
						<script>
						    CKEDITOR.replace( 'editor2' );
						</script></td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<td><input type="submit" name="action" value="Save">
						<input type="hidden" name="idChuong" value="<?php echo $chuyenmuc[0]; ?>">
						</form>
						<a href="monhocDetail.php?id=<?php echo $id; ?>">Cancel</a></td>
					<?php
						} else {
					?>
						<td><?php echo $chuyenmuc[1]; ?></td>
						<td><?php echo $chuyenmuc[2]; ?></td>
						<td><a href="chuongDetail.php?idChuong=<?php echo $chuyenmuc[0]; ?>">Trắc nghiệm</a></td>
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
						          <p>Chương <?php echo $chuyenmuc[1]; ?></p>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default"><a href="?action=delete&id=<?php echo $id; ?>&idChuong=<?php echo $chuyenmuc[0]; ?>">Yes</a></button>
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div>
						<button><a href="?action=edit&idChuong=<?php echo $chuyenmuc[0]; ?>&id=<?php echo $id; ?>">Edit</a></button></td>
					<?php		
						}
					?>
				</tr>
			
		<?php
			}
		?>
		</table>
	</div>
</div>
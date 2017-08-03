<?php
include "admin.php";
include ('../../model/diendandata.php');
$action=filter_input(INPUT_GET, 'action');
$id=filter_input(INPUT_GET, 'id');
if($action=="") $action=filter_input(INPUT_POST, 'action');
if($action=="add") {
	$name=filter_input(INPUT_POST, 'name');
	$content=filter_input(INPUT_POST, 'content');
	$theloai=filter_input(INPUT_POST, 'theloai');
	addchude($name,$content,$theloai);
	header("Location:diendan.php");
}
if($action=="Save") {
				$name=filter_input(INPUT_POST, 'name');
				$content=filter_input(INPUT_POST, 'content');
				$theloai=filter_input(INPUT_POST, 'theloai');
				$q="UPDATE chude
				SET content = :content, name = :name,theloai=:theloai;
				where id=:id";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$id);
	            $statement->bindValue(':name',$name);
				$statement->bindValue(':content',$content);
				$statement->bindValue(':theloai',$theloai);
	            $statement->execute();
	            header("Location:diendan.php");
}
if($action=="delete") {
				$id=filter_input(INPUT_GET, 'id');
				$q="DELETE FROM chude
					WHERE id=:id;";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$id);
	            $statement->execute();
	            header("Location:diendan.php");
}
?>
<div class="container panel panel-info">
<h1 style="text-align: center;">Diễn đàn Management</h1>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm chủ đề</button>
	  <div id="demo" class="collapse">
	    <div class="panel-body">
		<form action="?action=add" method="post">
			Name<br>
			<input type="text" name="name"><br><br>
			Nội dung<br>
			<textarea name="content" placeholder="Đối với xây dựng" id="editor1" rows="10" cols="80"></textarea>
			<script>
			    CKEDITOR.replace('editor1',{
			    	filebrowserBrowseUrl : '../../ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '../../ckfinder/ckfinder.html?type=Images',
			filebrowserFlashBrowseUrl : '../../ckfinder/ckfinder.html?type=Flash',
			filebrowserUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			
			    } );
			</script>
			<br><br>
			Chọn chuyên mục của chủ đềc<br>
			<select name="theloai">
				<option value="1">BDVH</option>
				<option value="2">Lớp nghiệp vụ xây dựng</option>
				<option value="3">Xây dựng</option>
			</select>
			<br><br>
			
			<button>Add</button>
			</form>
		</div>
		</div>
	<h3>Danh sách chủ đề</h3>
		<?php
			$q="SELECT * from chude";
			$statement=$db->prepare($q);
			$statement->execute();
			$rows=$statement->fetchAll();
		?>
	<table class="table">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Content</td>
			<td>Mục</td>
			<td>Ngày đăng</td>
			<td></td>
		</tr>
		<?php
			foreach ($rows as $monhoc) {
		?>
			
				
				<tr>
					<td><?php echo $monhoc[0]; ?></td>
					<?php 
						if(($action=="edit")&&($id==$monhoc[0])) {
					?>
						<form action="diendan.php" method="post">
						<td><input type="text" name="name" value="<?php echo $monhoc[1]; ?>"></td>
						<td><textarea name="content" placeholder="Đối với xây dựng" id="editor3" rows="10" cols="80">
							<?php echo $monhoc[2]; ?></textarea>
							<script>
							    CKEDITOR.replace( 'editor3',{
			    	filebrowserBrowseUrl : '../../ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : '../../ckfinder/ckfinder.html?type=Images',
			filebrowserFlashBrowseUrl : '../../ckfinder/ckfinder.html?type=Flash',
			filebrowserUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
			
			    }  );
							</script>
							</td>
						<td><select name="theloai">
								<option value="1">BDVH</option>
								<option value="2">Lớp nghiệp vụ xây dựng</option>
								<option value="3">Xây dựng</option>
							</select></td>
							<td><?php echo $monhoc[4]; ?></td>
						<td><input type="submit" name="action" value="Save">
						<input type="hidden" name="id" value="<?php echo $monhoc[0]; ?>">
						</form>
						<a href="diendan.php">Cancel</a></td>
					<?php
						} else {
					?>
						
						<td><?php echo $monhoc[1]; ?></td>
						<td><?php echo $monhoc[2]; ?></td>
						<td><?php echo $monhoc[3]; ?></td>
						<td><?php echo $monhoc[4]; ?></td>
						<td>
						<button type="button" data-toggle="modal" data-target="#<?php echo $monhoc[0]; ?>">Delete</button>
						  <div class="modal fade" id=<?php echo $monhoc[0]; ?> role="dialog">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Bạn có chắc muốn xóa chủ đề này</h4>
						        </div>
						        <div class="modal-body">
						          <p><?php echo $monhoc[1]; ?></p>
						        </div>
						        <div class="modal-footer">
						          <button type="button" class="btn btn-default"><a href="?action=delete&id=<?php echo $monhoc[0]; ?>">Yes</a></button>
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div>
						<button><a href="?action=edit&id=<?php echo $monhoc[0]; ?>">Edit</a></button></td>
					<?php		
						}
					?>
				</tr>
			
		<?php
			}
		?>
	</table>
</div>
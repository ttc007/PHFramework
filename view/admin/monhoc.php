<?php
include "admin.php";
include "../../model/chuyenmucData.php";
?>
<div class="container">
	<h1>Môn học management</h1>
	
	<div class="panel panel-info">
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm môn học</button>
	  <div id="demo" class="collapse">
	    <div class="panel-body">
		<form action="?action=add" method="post">
			Name<br><input type="text" name="name">
			<br><br>
			Chọn chuyên mục của môn học<br>
			<select name="chuyenmucID">
						<option>--Chọn--</option>
				<?php 
					$chuyenmucs=getChuyenmuc();
					foreach ($chuyenmucs as $chuyenmuc) {
				?>
						<option value="<?php echo "$chuyenmuc[0]";?>"><?php echo $chuyenmuc[1]; ?></option>
				<?php
					}
				?>
			</select>
			<br><br>
			Thông tin định mức<br>
			<textarea name="thongtindinhmuc" placeholder="Đối với xây dựng" id="editor1" rows="10" cols="80"></textarea>
			<script>
			    CKEDITOR.replace( 'editor1' );
			</script>
			<br><br>
			Phần mềm<br>
			<textarea name="phanmem" placeholder="Đối với xây dựng" placeholder="Đối với xây dựng" id="editor2" rows="10" cols="80"></textarea>
			<script>
			    CKEDITOR.replace( 'editor2' );
			</script>
			<br><br>
			<button>Add</button>
			</form>
		</div>
	
	</div>
		<?php
			include ('../../model/data.php');
			global $db;
			$action=filter_input(INPUT_GET, 'action');
			if($action=="") $action=filter_input(INPUT_POST, 'action');
			if($action=="add") {

				$q="INSERT INTO monhoc (name,chuyenmuc_id,thongtindinhmuc,phanmem)
					VALUES (:name,:chuyenmucID,:thongtindinhmuc,:phanmem);";
				$name=filter_input(INPUT_POST, 'name');
				$chuyenmucID=filter_input(INPUT_POST, 'chuyenmucID');
				$thongtindinhmuc=filter_input(INPUT_POST, 'thongtindinhmuc');
				$phanmem=filter_input(INPUT_POST, 'phanmem');
				$statement=$db->prepare($q);
	            $statement->bindValue(':name',$name);
	            $statement->bindValue(':thongtindinhmuc',$thongtindinhmuc);
	            $statement->bindValue(':phanmem',$phanmem);
	            $statement->bindValue(':chuyenmucID',$chuyenmucID);
	            $statement->execute();
	            header("Location:monhoc.php");
			}
			if($action=="delete") {
				$id=filter_input(INPUT_GET, 'id');
				$q="DELETE FROM monhoc
					WHERE id=:id;";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$id);
	            $statement->execute();
	            header("Location:monhoc.php");
			}
			if($action=="edit") {
				$id=filter_input(INPUT_GET, 'id');
			}
			if($action=="Save") {
				$id=filter_input(INPUT_POST, 'id');
				$name=filter_input(INPUT_POST, 'name');
				$chuyenmucID=filter_input(INPUT_POST, 'chuyenmucID');
				$thongtindinhmuc=filter_input(INPUT_POST, 'thongtindinhmuc');
				$phanmem=filter_input(INPUT_POST, 'phanmem');
				$q="UPDATE monhoc
				SET name = :name, chuyenmuc_id = :chuyenmucID,thongtindinhmuc=:thongtindinhmuc,phanmem=:phanmem
				WHERE id=:id;";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$id);
	            $statement->bindValue(':name',$name);
	            $statement->bindValue(':thongtindinhmuc',$thongtindinhmuc);
	            $statement->bindValue(':phanmem',$phanmem);
	            $statement->bindValue(':chuyenmucID',$chuyenmucID);
	            $statement->execute();
	            header("Location:monhoc.php");
			}
			
		?>
	
	<h3>Danh sách môn học</h3>
	<div>
		<?php
			$q="SELECT * from monhoc";
			$statement=$db->prepare($q);
			$statement->execute();
			$rows=$statement->fetchAll();
		?>
			<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Chuyên mục</td>
				<td></td>
				<td></td>
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
						<form action="monhoc.php" method="post">
						<td><input type="text" name="name" value="<?php echo $monhoc[1]; ?>"></td>
						<td><select name="chuyenmucID">
										<option>--Chọn--</option>
								<?php 
									$chuyenmucs=getChuyenmuc();
									foreach ($chuyenmucs as $chuyenmuc) {
								?>
									<?php 
										if($chuyenmuc[0]==$monhoc[2]) {
									?>
										<option value="<?php echo "$chuyenmuc[0]";?>" selected><?php echo $chuyenmuc[1]; ?></option>
									<?php 
									    } else {
									?>
										<option value="<?php echo "$chuyenmuc[0]";?>"><?php echo $chuyenmuc[1]; ?></option>
								<?php
									} }
								?>
							</select></td>
							<td><textarea name="thongtindinhmuc" placeholder="Đối với xây dựng" id="editor3" rows="10" cols="80">
							<?php echo $monhoc[3]; ?></textarea>
							<script>
							    CKEDITOR.replace( 'editor3' );
							</script>
							</td>
							<td><textarea name="phanmem" placeholder="Đối với xây dựng" id="editor4" rows="10" cols="80">
							<?php echo $monhoc[4]; ?></textarea>
								<script>
							    CKEDITOR.replace( 'editor4' );
								</script>
							</td>
						<td><input type="submit" name="action" value="Save">
						<input type="hidden" name="id" value="<?php echo $monhoc[0]; ?>">
						</form>
						<a href="monhoc.php">Cancel</a></td>
					<?php
						} else {
					?>
						
						<td><a href="monhocDetail.php?id=<?php echo $monhoc[0]; ?>"><?php echo $monhoc[1]; ?></a></td>
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
						          <h4 class="modal-title">Bạn có chắc muốn xóa môn học này</h4>
						        </div>
						        <div class="modal-body">
						          <p>Môn học<?php echo $monhoc[1]; ?></p>
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

</div>

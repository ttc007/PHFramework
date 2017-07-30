<?php
include "admin.php";
include "../../model/chuyenmucData.php";
?>
<div class="container">
	<h1>Mon hoc management</h1>
	
	<div class="panel panel-info">
	<h3>Them mon hoc</h3>
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
		<button>Add</button>
	</div>
	</div>
		<?php
			include ('../../model/data.php');
			global $db;
			$action=filter_input(INPUT_GET, 'action');
			if($action=="") $action=filter_input(INPUT_POST, 'action');
			if($action=="add") {

				$q="INSERT INTO monhoc (name,chuyenmuc_id)
					VALUES (:name,:chuyenmucID);";
				$name=filter_input(INPUT_POST, 'name');
				$chuyenmucID=filter_input(INPUT_POST, 'chuyenmucID');
				$statement=$db->prepare($q);
	            $statement->bindValue(':name',$name);
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
				$q="UPDATE chuyenmuc
				SET name = :name
				WHERE id=:id;";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$id);
	            $statement->bindValue(':name',$name);
	            $statement->execute();
	            header("Location:chuyenmuc.php");
			}
			
		?>
	</form>
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
										<option value="<?php echo "$chuyenmuc[0]";?>"><?php echo $chuyenmuc[1]; ?></option>
								<?php
									}
								?>
							</select></td>
						<td><input type="submit" name="action" value="Save">
						<input type="hidden" name="id" value="<?php echo $monhoc[0]; ?>">
						</form>
						<a href="monhoc.php">Cancel</a></td>
					<?php
						} else {
					?>
						<td><?php echo $monhoc[1]; ?></td>
						<td><?php echo $monhoc[2]; ?></td>
						<td>
						<!-- <button><a href="?action=delete&id=<?php echo $monhoc[0]; ?>">Delete</a></button> -->
						<button type="button" data-toggle="modal" data-target="#<?php echo $monhoc[1]; ?>">Delete</button>
						  <div class="modal fade" id="<?php echo $monhoc[1]; ?>" role="dialog">
						    <div class="modal-dialog">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Bạn có chắc muốn xóa chuyên mục này</h4>
						        </div>
						        <div class="modal-body">
						          <p>Chuyên mục <?php echo $chuyenmuc[1]; ?></p>
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

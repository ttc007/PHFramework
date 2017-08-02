<?php
include "admin.php";

include ('../../model/data.php');
include ('../../model/chuyenmucData.php');
?>
<div class="container">
	<h1>Chuyên mục management</h1>
	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm chuyên mục</button>
	  <div id="demo" class="collapse">
	    <form action="?action=add" method="post">
			Name<br><input type="text" name="name">
			<button>Add</button>
		</form>
	  </div>

		<?php
			
			global $db;
			$action=filter_input(INPUT_GET, 'action');
			if($action=="") $action=filter_input(INPUT_POST, 'action');
			if($action=="add") {
				$name=filter_input(INPUT_POST, 'name');
				addChuyenmuc($name);
				header("Location:chuyenmuc.php");
			}
			if($action=="delete") {
				$id=filter_input(INPUT_GET, 'id');
				deleteChuyenmuc($id);
	            header("Location:chuyenmuc.php");
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
	
	<h3>Danh sách chuyên mục</h3>
	<div>
		<?php
			$rows = getChuyenmuc();
		?>
			<table class="table table-striped">
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td></td>
			</tr>
		<?php
			foreach ($rows as $chuyenmuc) {
		?>
			
				
				<tr>
					<td><?php echo $chuyenmuc[0]; ?></td>
					<?php 
						if(($action=="edit")&&($id==$chuyenmuc[0])) {
					?>
						<form action="chuyenmuc.php" method="post">
						<td><input type="text" name="name" value="<?php echo $chuyenmuc[1]; ?>"></td>
						<td><input type="submit" name="action" value="Save">
						<input type="hidden" name="id" value="<?php echo $chuyenmuc[0]; ?>">
						</form>
						<a href="chuyenmuc.php">Cancel</a></td>
					<?php
						} else {
					?>
						<td><?php echo $chuyenmuc[1]; ?></td>
						<td>
						<button type="button" data-toggle="modal" data-target="#<?php echo $chuyenmuc[1]; ?>">Delete</button>
						  <div class="modal fade" id="<?php echo $chuyenmuc[1]; ?>" role="dialog">
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
						          <button type="button" class="btn btn-default"><a href="?action=delete&id=<?php echo $chuyenmuc[0]; ?>">Yes</a></button>
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>
						      
						    </div>
						  </div>
						<button><a href="?action=edit&id=<?php echo $chuyenmuc[0]; ?>">Edit</a></button></td>
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

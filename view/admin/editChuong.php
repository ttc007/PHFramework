<?php
include "admin.php";
include "../../model/monhocData.php";
$id=filter_input(INPUT_GET, 'id');
if($id=="")$id=filter_input(INPUT_POST, 'id');
$action=filter_input(INPUT_POST, 'action');
$chuong=getChuong($id);
if($action=="Save") {
	// $idChuong=filter_input(INPUT_POST, 'idChuong');
				$name=filter_input(INPUT_POST, 'name');
				$content=filter_input(INPUT_POST, 'content');
				$baitap=filter_input(INPUT_POST, 'baitap');
				$q="UPDATE chuong
				SET name = :name, content = :content, baitap=:baitap
				WHERE id=:id;";
				$statement=$db->prepare($q);
	            $statement->bindValue(':id',$id);
	            $statement->bindValue(':name',$name);
	            $statement->bindValue(':content',$content);
	            $statement->bindValue(':baitap',$baitap);
	            $statement->execute();
	            header("Location:monhocDetail.php?id=$chuong[4]");
}

?>
<div class="container">
<form action="editChuong.php" method="post">
			Name
			<br>
			<input type="text" name="name" value="<?php echo $chuong[1]; ?>">
			<br><br>
			Content<br>
			<input type="hidden" name="id" value="<?php echo $chuong[0]; ?>">
			<textarea name="content" id="editor1" rows="10" cols="80"><?php echo $chuong[2]; ?></textarea>
			<script>
			    CKEDITOR.replace( 'editor1' );
			</script>
			<br><br>
			Bài tập<br>
			<textarea name="baitap" id="editor3" rows="10" cols="80"><?php echo $chuong[3]; ?></textarea>
			<script>
			    CKEDITOR.replace( 'editor3' );
			</script>
			<br>
			<input type="submit" name="action" value="Save">
 			</form>
			<a href="monhocDetail.php?id=<?php echo $id; ?>">Cancel</a></td>
</div>
// <!-- <?php 
// 		if(($action=="edit")&&($idChuong==$chuyenmuc[0])) {
// 	?> -->
// 						<!-- <tr>
// 					<td><?php echo $chuyenmuc[0]; ?></td>
// 						<form action="monhocDetail.php" method="post">
// 						<td><input type="text" name="name" value="<?php echo $chuyenmuc[1]; ?>"></td>
// 						<td>
// 						<textarea name="content" id="editor2" rows="10" cols="80" value="<?php echo $chuyenmuc[2]; ?>"><?php echo $chuyenmuc[2]; ?></textarea>
// 						<script>
// 						    CKEDITOR.replace( 'editor2' );
// 						</script></td>
// 						<td>
// 							<textarea name="baitap" id="editor4" rows="10" cols="80"><?php echo $chuyenmuc[3]; ?></textarea>
// 							<script>
// 							    CKEDITOR.replace( 'editor4' );
// 							</script>
// 						</td>
// 						<input type="hidden" name="id" value="<?php echo $id; ?>">
// 						<td><input type="submit" name="action" value="Save">
// 						<input type="hidden" name="idChuong" value="<?php echo $chuyenmuc[0]; ?>">
// 						</form>
// 						<a href="monhocDetail.php?id=<?php echo $id; ?>">Cancel</a></td>
					
// 				</tr> -->
						
						
// 					<!-- <?php		
// 						} exit();
// 					?> -->
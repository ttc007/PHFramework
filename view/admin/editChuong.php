<?php
include "admin.php";

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
			    CKEDITOR.replace( 'editor1');
			</script>
			<br><br>
			Bài tập<br>
			<textarea name="baitap" id="editor3" rows="10" cols="80"><?php echo $chuong[3]; ?></textarea>
			<script>
			    CKEDITOR.replace( 'editor3');
			</script>
			<br>
			<input type="submit" name="action" value="Save">
 			</form>
			<a href="monhocDetail.php?id=<?php echo $id; ?>">Cancel</a></td>
</div>

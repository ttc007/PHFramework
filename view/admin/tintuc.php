<?php
include "admin.php";
include ('../../model/data.php');
?>
<div class="container panel panel-info">
<h1 style="text-align: center;">Tin tức Management</h1>
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Thêm tin tức</button>
	  <div id="demo" class="collapse">
	    <div class="panel-body">
		<form action="?action=add" method="post">
			Nội dung<br>
			<textarea name="thongtindinhmuc" placeholder="Đối với xây dựng" id="editor1" rows="10" cols="80"></textarea>
			<script>
			    CKEDITOR.replace('editor1');
			</script>
			<br><br>
			Chọn chuyên mục của tin tức<br>
			<select name="chuyenmucID">
				<option value="1">BDVH</option>
				<option value="2">Lớp nghiệp vụ xây dựng</option>
				<option value="3">Xây dựng</option>
			</select>
			<br><br>
			
			<button>Add</button>
			</form>
		</div>
		</div>
	<h3>Danh sách tin tức</h3>
		<?php
			$q="SELECT * from tintuc";
			$statement=$db->prepare($q);
			$statement->execute();
			$rows=$statement->fetchAll();
		?>
	<table class="table">
		<tr>
			<td>ID</td>
			<td>Content</td>
			<td>Mục</td>
			<td></td>
		</tr>
		<?php
			foreach ($rows as $value) {
		?>
		<tr>
			<td><?php echo $value[0]?></td>
			<td><?php echo $value[1]?></td>
			<td><?php echo $value[2]?></td>
			<td><a href="">Edit</a></td>
			<td><a href="">Delete</a></td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
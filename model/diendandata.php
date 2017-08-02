<?php
include 'data2.php';
function getchude1() {
	global $db;
	$q="SELECT * from chude where theloai=1";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getchude2() {
	global $db;
	$q="SELECT * from chude where theloai=2";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getchude3() {
	global $db;
	$q="SELECT * from chude where theloai=3";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function addchude($name,$content,$theloai) {
	global $db;
	$q="INSERT INTO chude (name,content,theloai,ngaytao)
		VALUES (:name,:content,:theloai,:ngaydang);";
	$statement=$db->prepare($q);
	$statement->bindValue(':name',$name);
	$statement->bindValue(':content',$content);
	$statement->bindValue(':theloai',$theloai);
	$ngaydang=date("Y/m/d H:i");
    $statement->bindValue(':ngaydang',$ngaydang);
	$statement->execute();
}
function getChudechitiet($id){
	global $db;
	$q="SELECT * from chude where id=:id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$rows=$statement->fetch();
	return $rows;
}
function addcomment($id,$name,$content) {
	global $db;
	$q="INSERT INTO binhluan (name,content,ngaydang,chude_id)
		VALUES (:name,:content,:ngaydang,:id);";
	$statement=$db->prepare($q);
	$statement->bindValue(':name',$name);
	$statement->bindValue(':content',$content);
	$statement->bindValue(':id',$id);
	$ngaydang=date("Y/m/d H:i");
    $statement->bindValue(':ngaydang',$ngaydang);
	$statement->execute();
}
function getbinhluan($id){
	global $db;
	$q="SELECT * from binhluan where chude_id=:id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
?>
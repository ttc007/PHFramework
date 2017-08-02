<?php
include 'data2.php';
function getDanhsachtintuc1() {
	global $db;
	$q="SELECT * from tintuc where theloai=1";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getDanhsachtintuc2() {
	global $db;
	$q="SELECT * from tintuc where theloai=2";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getDanhsachtintuc3() {
	global $db;
	$q="SELECT * from tintuc where theloai=3";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function addtintuc($name,$content,$theloai) {
	global $db;
	$q="INSERT INTO tintuc (name,content,theloai,ngaydang)
		VALUES (:name,:content,:theloai,:ngaydang);";
	$statement=$db->prepare($q);
	$statement->bindValue(':name',$name);
	$statement->bindValue(':content',$content);
	$statement->bindValue(':theloai',$theloai);
	$ngaydang=date("Y/m/d H:i");
    $statement->bindValue(':ngaydang',$ngaydang);
	$statement->execute();
}
function gettintucchitiet($id){
	global $db;
	$q="SELECT * from tintuc where id=:id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$rows=$statement->fetch();
	return $rows;
}
?>
<?php
include 'data2.php';
function getDanhsachDangkis() {
	global $db;
	$q="SELECT * from dangkihoc where trangthai>0 order by trangthai";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getDangkihocNew() {
	global $db;
	$q="SELECT * from dangkihoc where trangthai=0";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function changeStatusDangkihoc($id) {
	global $db;
	$q="UPDATE dangkihoc SET trangthai=1 where id=:id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
}
function changeStatusDangkihoc2($id) {
	global $db;
	$q="UPDATE dangkihoc SET trangthai=2 where id=:id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
}
?>
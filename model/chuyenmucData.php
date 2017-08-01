<?php 
include 'data.php';
function getChuyenmuc() {
	global $db;
	$q="SELECT * from chuyenmuc";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getChuyenmuc1() {
	global $db;
	$q="SELECT * from chuyenmuc where loai=1";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getChuyenmuc2() {
	global $db;
	$q="SELECT * from chuyenmuc where loai=2";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetch();
	return $rows;
}
function addChuyenmuc($name) {
	global $db;
	$q="INSERT INTO chuyenmuc (name)
		VALUES (:name);";
	$statement=$db->prepare($q);
	$statement->bindValue(':name',$name);
	$statement->execute();           
}
function deleteChuyenmuc($id) {
	global $db;
	$q="DELETE FROM chuyenmuc
		WHERE id=:id;";
	$statement=$db->prepare($q);
    $statement->bindValue(':id',$id);
	$statement->execute();          
}

?>

<?php 
include 'data.php';
function getMonhocs() {
	global $db;
	$q="SELECT * from monhoc";
	$statement=$db->prepare($q);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}

function getMonhoc($id) {
	global $db;
	$q="SELECT * from monhoc where id = :id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$rows=$statement->fetch();
	return $rows;
}

function getChuongs($monhocId) {
	global $db;
	$q="SELECT * from chuong where monhoc_id = :id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$monhocId);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function getChuong($id) {
	global $db;
	$q="SELECT * from chuong where id = :id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$rows=$statement->fetch();
	return $rows;
}
function addChuong($name,$content,$baitap,$monhocId) {
	global $db;
	$q="INSERT INTO chuong (name,content,baitap,monhoc_id)
		VALUES (:name,:content,:baitap,:monhocId);";
	$statement=$db->prepare($q);
	$statement->bindValue(':name',$name);
	$statement->bindValue(':content',$content);
	$statement->bindValue(':baitap',$baitap);
	$statement->bindValue(':monhocId',$monhocId);
	$statement->execute();
}
function deleteChuong($id) {
	global $db;
	$q="DELETE FROM chuong
		WHERE id=:id;";
	$statement=$db->prepare($q);
    $statement->bindValue(':id',$id);
	$statement->execute();
}
function getTracnghiems($chuongid) {
	global $db;
	$q="SELECT * from tracnghiem where chuong_id = :id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$chuongid);
	$statement->execute();
	$rows=$statement->fetchAll();
	return $rows;
}
function addTracnghiem($content,$daA,$idChuong) {
	global $db;
	$q="INSERT INTO tracnghiem (content,daA,daB,daC,daD,daCX,chuong_id)
		VALUES (:content,:daA,:daB,:daC,:daD,:daCX,:chuong_id);";
	$statement=$db->prepare($q);
	$statement->bindValue(':content',$content);
	$statement->bindValue(':daA',$daA);
	$statement->bindValue(':daB',$daB);
	$statement->bindValue(':daC',$daC);
	$statement->bindValue(':daD',$daD);
	$statement->bindValue(':daCX',$daCX);
	$statement->bindValue(':chuong_id',$idChuong);
	$statement->execute();
}
function deleteTracnghiem($id) {
	global $db;
	$q="DELETE FROM tracnghiem
		WHERE id=:id;";
	$statement=$db->prepare($q);
    $statement->bindValue(':id',$id);
	$statement->execute();
}
function saveTracnghiem($id,$content,$daA,$idChuong) {
	global $db;
	$q="UPDATE chuong
		SET content = :content, daA=:daA, daB=:daB,daC=:daC,daD=:daD,daCX=:daCX
		WHERE id=:id;";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->bindValue(':content',$content);
	$statement->bindValue(':daA',$daA);
	$statement->bindValue(':daB',$daB);
	$statement->bindValue(':daC',$daC);
	$statement->bindValue(':daD',$daD);
	$statement->bindValue(':daCX',$daCX);
	$statement->execute();
}
<?php
 $dsn="mysql:host=localhost;dbname=tranmoi";
        $username='root';
        $password='';
        $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $db=new PDO($dsn,$username,$password,$options);
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
function getMonhocRef($id) {
	global $db;
	$q="SELECT * from monhoc where chuyenmuc_id = :id";
	$statement=$db->prepare($q);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$rows=$statement->fetchAll();
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

function getChuongAll() {
	global $db;
	$q="SELECT * from chuong ";
	$statement=$db->prepare($q);
	// $statement->bindValue(':id',$monhocId);
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
function addTracnghiem($content,$daA,$daB,$daC,$daD,$daCX,$idChuong) {
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
function saveTracnghiem($id,$content,$daA,$daB,$daC,$daD,$daCX) {
	global $db;
	$q="UPDATE tracnghiem
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

?>	
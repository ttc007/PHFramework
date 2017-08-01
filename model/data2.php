<?php
 $dsn="mysql:host=localhost;dbname=tranmoi";
        $username='root';
        $password='';
        $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $db=new PDO($dsn,$username,$password,$options);

?>
<?php
	$opt=array(PDO::ATTR_AUTOCOMMIT=>1,PDO::ATTR_PERSISTENT=>false);
	try{
		$pdo=new PDO("uri:dsn.ini","root","lvyang@123456",$opt);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "数据库连接失败！".$e->getMessage()."<br>";
		exit;
	}
	echo "连接数据库成功！<br>";
	try{
		$affected_rows=$pdo->exec("insert into shops(name,price,num,desn) values('xsphp','12','35','very good')");
	}catch(PDOException $e){
		echo $e->getMessage();
	}


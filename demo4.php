<?php
	$opt=array(PDO::ATTR_AUTOCOMMIT=>1,PDO::ATTR_PERSISTENT=>false,PDO::ATTR_AUTOCOMMIT=>0);
	try{
		$pdo=new PDO("uri:dsn.ini","root","lvyang@123456",$opt);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "数据库连接失败！".$e->getMessage()."<br>";
		exit;
	}
	echo "连接数据库成功！<br>";
	try{
		$pdo->beginTransaction();
		$price=5000;
		$out='zhangsan';
		$in='lisi';
		$sql="update account set money=money-($price) where name='zhangsan'";
		$affected_rows=$pdo->exec($sql);
		if (!$affected_rows)
			throw new PDOException("张三转出失败!");
		$sql="update account set money=money+{$price} where name='lisi'";
		$affected_rows=$pdo->exec($sql);
		if(!$affected_rows)
			throw new PDOException("向李四转入失败!");
		$pdo->commit();
		echo "交易成功.<br>";
	}catch(PDOException $e){
		echo $e->getMessage();
		$pdo->rollback();
	}
	
	$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,1);


